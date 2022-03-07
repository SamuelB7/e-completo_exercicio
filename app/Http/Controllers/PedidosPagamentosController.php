<?php

namespace App\Http\Controllers;

use App\Models\LojasGateways;
use App\Models\Pedidos;
use App\Models\PedidosPagamentos;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PedidosPagamentosController extends Controller
{
    public function processPayment($purchaseId) {
        $pedido = Pedidos::find($purchaseId);
        $pedidoPagamento = PedidosPagamentos::where('id_pedido', $pedido->id)->first();
        $loja = LojasGateways::where('id_loja', $pedido->id_loja)->first();

        if($pedidoPagamento->id_formapagto != 3) {
            return response()->json('Só é permitido o uso de cartão de crédito', 400);
        }

        if($pedido->id_situacao != 1) {
            return response()->json('Só é permitido processar pagamentos que ainda estão pendentes', 400);
        }

        if($loja->id_gateway != 1) {
            return response()->json('Só é permitido o uso do PAGCOMPLETO', 400);
        }

        $external_order_id = $pedido->id;
        $amount = $pedido->valor_total + $pedido->valor_frete;
        $card_number = $pedidoPagamento->num_cartao;
        $card_cvv = $pedidoPagamento->codigo_verificacao;

        $card_expiration_date = str_replace('-', '', $pedidoPagamento->vencimento);
        $card_expiration_date = substr($card_expiration_date, 2);
        $str1 = $card_expiration_date[strlen($card_expiration_date) - 2];
        $str2 = $card_expiration_date[strlen($card_expiration_date) - 1];
        $str3 = $card_expiration_date[0];
        $str4 = $card_expiration_date[1];
        $card_expiration_date = $str1.$str2.$str3.$str4;

        $card_holder_name = $pedidoPagamento->nome_portador;

        $type = '';
        $documentType = '';

        if(strlen($pedido->clientes->cpf_cnpj) == 14) {
            $type = 'corporation';
            $documentType = 'cnpj';
        } else {
            $type = 'individual';
            $documentType = 'cpf';
        }

        $email = $pedido->clientes->email;

        $documents = [
            'type' => $documentType,
            'number' => $pedido->clientes->cpf_cnpj
        ];

        $customer = [
            'external_id' => $pedido->clientes->id,
            'name' => $pedido->clientes->nome,
            'type' => $type,
            'email' => $email,
            'documents' => $documents,
            'birthday' => $pedido->clientes->data_nasc
        ];

        $postData = [
            'external_order_id' => $external_order_id,
            'amount' => $amount,
            'card_number' => $card_number,
            'card_cvv' => $card_cvv,
            'card_expiration_date' => $card_expiration_date,
            'card_holder_name' => $card_holder_name,
            'customer' => $customer
        ];

        $client = new Client();

        $post = json_decode(
            $client->request(
                'POST',
                'https://api11.ecompleto.com.br/exams/processTransaction',
                [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Authorization' => 'cb2eceb3338a2d3e845c4a14cb4f8887'
                    ],
                    'json' => $postData
                ]
            )->getBody()->getContents(), true
        );
        
        date_default_timezone_set('America/Sao_Paulo');
        
        if($post['Error'] == true) {
            $pedidoPagamento->retorno_intermediador = $post;
            $pedidoPagamento->data_processamento = date('m/d/Y h:i:s a', time());
            $pedidoPagamento->save();

            $pedido->id_situacao = 3;
            $pedido->save();
            return response()->json('Pagamento não realizado, o pedido foi cancelado', 400);
        } 

        if($post['Error'] == false) {
            $pedidoPagamento->retorno_intermediador = $post;
            $pedidoPagamento->data_processamento = date('m/d/Y h:i:s a', time());
            $pedidoPagamento->save();

            $pedido->id_situacao = 2;
            $pedido->save();
            return response()->json('Pagamento realizado com sucesso!', 200);
        }

        //return response()->json($post);
    }
}
