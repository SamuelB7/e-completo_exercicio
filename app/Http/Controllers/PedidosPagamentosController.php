<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\PedidosPagamentos;
use Illuminate\Http\Request;

class PedidosPagamentosController extends Controller
{
    public function processPayment($purchaseId) {
        $pedido = Pedidos::find($purchaseId);
        $pedidoPagamento = PedidosPagamentos::where('id_pedido', $pedido->id)->get();

        $external_order_id = $pedido->id;
        $amount = $pedido->valor_total + $pedido->valor_frete;
        $card_number = $pedidoPagamento->num_cartao;
        $card_cvv = $pedidoPagamento->codigo_verificacao;
        $card_expiration_date = $pedidoPagamento->vencimento;
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

        $customer = [
            'external_id' => $pedido->clientes->id,
            'name' => $pedido->clientes->nome,
            'type' => $type,
            'email' => $email,
            'documents' => [
                'type' => $documentType,
                'number' => 
            ]
        ];

        $data = [
            'pedido' => $pedido,
            'pedidoPagamento' => $pedidoPagamento,
            'cliente' => $pedido->clientes,
            'situação' => $pedido->pedidoSituacao
        ];
        return response()->json($data);
    }
}
