<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            
            [
                'id' => 8796,
                'nome' => 'Emanuelly Alice Alessandra de Paula',
                'cpf_cnpj' => '96446953722',
                'email' => 'emanuellyalice@ecompleto.com.br',
                'tipo_pessoa' => 'F',
                'data_nasc' => '1988-01-18',
                'id_loja' => 90
            ],
            [
                'id' => 5789,
                'nome' => 'Renato Ryan Lopes',
                'cpf_cnpj' => '78891957615',
                'email' => 'erenato_ryan@ecompleto.com.br',
                'tipo_pessoa' => 'F',
                'data_nasc' => '1947-02-08',
                'id_loja' => 92
            ],
            [
                'id' => 6748,
                'nome' => 'Kauê Bryan Souza',
                'cpf_cnpj' => '55782338806',
                'email' => 'kauesouza@ecompleto.com.br',
                'tipo_pessoa' => 'F',
                'data_nasc' => '1945-06-27',
                'id_loja' => 90
            ],
            [
                'id' => 6872,
                'nome' => 'Samuel Emanuel Castro',
                'cpf_cnpj' => '85673855800',
                'email' => 'samuel.castro@ecompleto.com.br',
                'tipo_pessoa' => 'F',
                'data_nasc' => '1988-11-05',
                'id_loja' => 115
            ],
            [
                'id' => 6716,
                'nome' => 'Raquel Nicole Moura',
                'cpf_cnpj' => '36118844720',
                'email' => 'raquelnicole_moura@ecompleto.com.br',
                'tipo_pessoa' => 'F',
                'data_nasc' => '1990-02-20',
                'id_loja' => 98
            ],
            [
                'id' => 4802,
                'nome' => 'Fernando Julio Ramos',
                'cpf_cnpj' => '20499776461',
                'email' => 'fernando_julio99@ecompleto.com.br',
                'tipo_pessoa' => 'F',
                'data_nasc' => '1999-09-11',
                'id_loja' => 97
            ],
            [
                'id' => 9484,
                'nome' => 'Kevin Yuri Pedro Lopes',
                'cpf_cnpj' => '95829123088',
                'email' => 'kevinpedro@ecompleto.com.br',
                'tipo_pessoa' => 'F',
                'data_nasc' => '1996-06-03',
                'id_loja' => 94
            ],
            [
                'id' => 1830,
                'nome' => 'Thales André Pereira',
                'cpf_cnpj' => '13440817709',
                'email' => 'samuel.castro@ecompleto.com.br',
                'tipo_pessoa' => 'F',
                'data_nasc' => '1995-04-07',
                'id_loja' => 90
            ],
            [
                'id' => 2280,
                'nome' => 'Heloisa Valentina Fabiana Moura',
                'cpf_cnpj' => '99386767660',
                'email' => 'heloisavalentina@ecompleto.com.br',
                'tipo_pessoa' => 'F',
                'data_nasc' => '1984-12-12',
                'id_loja' => 92
            ],
        ]);

        DB::table('formas_pagamento')->insert([
            [
                'id' => 1,
                'descricao' => 'Boleto Bancário'
            ],
            [
                'id' => 2,
                'descricao' => 'Depósito Bancário'
            ],
            [
                'id' => 3,
                'descricao' => 'Cartão de crédito'
            ],
        ]);

        DB::table('gateways')->insert([
            [
                'id' => 1,
                'descricao' => 'PAGCOMPLETO',
                'endpoint' => 'https://api11.ecompleto.com.br/'
            ],
            [
                'id' => 2,
                'descricao' => 'CIELO',
                'endpoint' => 'https://api.cielo.com.br/v1/transactions/'
            ],
            [
                'id' => 3,
                'descricao' => 'PAGSEGURO',
                'endpoint' => 'https://api.pagseguro.com.br/transactions/'
            ],
        ]);

        DB::table('lojas_gateway')->insert([
            [
                'id' => 1,
                'id_loja' => 90,
                'id_gateway' => 1
            ],
            [
                'id' => 2,
                'id_loja' => 92,
                'id_gateway' => 2
            ],
            [
                'id' => 3,
                'id_loja' => 115,
                'id_gateway' => 1
            ],
            [
                'id' => 4,
                'id_loja' => 98,
                'id_gateway' => 1
            ],
            [
                'id' => 5,
                'id_loja' => 97,
                'id_gateway' => 1
            ],
            [
                'id' => 6,
                'id_loja' => 94,
                'id_gateway' => 1
            ],
        ]);

        DB::table('pedido_situacao')->insert([
            [
                'id' => 1,
                'descricao' => 'Aguardando Pagamento'
            ],
            [
                'id' => 2,
                'descricao' => 'Pagamento Identificado'
            ],
            [
                'id' => 3,
                'descricao' => 'Pedido Cancelado'
            ],
        ]);

        DB::table('pedidos')->insert([
            [
                'id' => 98302,
                'valor_total' => 250.74,
                'valor_frete' => 33.4,
                'data' => '2021-08-20 00:00:00',
                'id_cliente' => 8796,
                'id_loja' => 90,
                'id_situacao' => 1
            ],
            [
                'id' => 98303,
                'valor_total' => 583.92,
                'valor_frete' => 57.85,
                'data' => '2021-08-23 00:00:00',
                'id_cliente' => 5789,
                'id_loja' => 92,
                'id_situacao' => 1
            ],
            [
                'id' => 98304,
                'valor_total' => 97.25,
                'valor_frete' => 17.5,
                'data' => '2021-08-23 00:00:00',
                'id_cliente' => 6748,
                'id_loja' => 90,
                'id_situacao' => 2
            ],
            [
                'id' => 98305,
                'valor_total' => 66.89,
                'valor_frete' => 22.55,
                'data' => '2021-08-25 00:00:00',
                'id_cliente' => 6872,
                'id_loja' => 115,
                'id_situacao' => 2
            ],
            [
                'id' => 98306,
                'valor_total' => 115.9,
                'valor_frete' => 19.5,
                'data' => '2021-08-25 00:00:00',
                'id_cliente' => 6716,
                'id_loja' => 98,
                'id_situacao' => 1
            ],
            [
                'id' => 98307,
                'valor_total' => 153.72,
                'valor_frete' => 25.5,
                'data' => '2021-08-25 00:00:00',
                'id_cliente' => 4802,
                'id_loja' => 97,
                'id_situacao' => 1
            ],
            [
                'id' => 98308,
                'valor_total' => 87.9,
                'valor_frete' => 13.5,
                'data' => '2021-08-26 00:00:00',
                'id_cliente' => 9484,
                'id_loja' => 94,
                'id_situacao' => 1
            ],
            [
                'id' => 98309,
                'valor_total' => 223.9,
                'valor_frete' => 28.75,
                'data' => '2021-08-27 00:00:00',
                'id_cliente' => 1830,
                'id_loja' => 90,
                'id_situacao' => 2
            ],
            [
                'id' => 98310,
                'valor_total' => 58.9,
                'valor_frete' => 19.85,
                'data' => '2021-08-27 00:00:00',
                'id_cliente' => 2280,
                'id_loja' => 92,
                'id_situacao' => 1
            ],
        ]);

        DB::table('pedidos_pagamentos')->insert([
            [
                'id' => 103013,
                'id_pedido' => 98302,
                'id_formapagto' => 3,
                'qtd_parcelas' => 4,
                'retorno_intermediador' => null,
                'data_processamento' => null,
                'num_cartao' => '5236387041984690',
                'nome_portador' => 'Elisa Adriana Barbosa',
                'codigo_verificacao' => '319',
                'vencimento' => '2022-08'
            ],
            [
                'id' => 103014,
                'id_pedido' => 98303,
                'id_formapagto' => 3,
                'qtd_parcelas' => 2,
                'retorno_intermediador' => null,
                'data_processamento' => null,
                'num_cartao' => '5372472213342610',
                'nome_portador' => 'Renato Ryan',
                'codigo_verificacao' => '848',
                'vencimento' => '2022-03'
            ],
            [
                'id' => 103015,
                'id_pedido' => 98304,
                'id_formapagto' => 1,
                'qtd_parcelas' => 1,
                'retorno_intermediador' => null,
                'data_processamento' => null,
                'num_cartao' => null,
                'nome_portador' => null,
                'codigo_verificacao' => null,
                'vencimento' => null
            ],
            [
                'id' => 103016,
                'id_pedido' => 98305,
                'id_formapagto' => 2,
                'qtd_parcelas' => 1,
                'retorno_intermediador' => null,
                'data_processamento' => null,
                'num_cartao' => null,
                'nome_portador' => null,
                'codigo_verificacao' => null,
                'vencimento' => null
            ],
            [
                'id' => 103017,
                'id_pedido' => 98306,
                'id_formapagto' => 3,
                'qtd_parcelas' => 1,
                'retorno_intermediador' => null,
                'data_processamento' => null,
                'num_cartao' => '4929521310619600',
                'nome_portador' => 'Raquel Moura',
                'codigo_verificacao' => '721',
                'vencimento' => '2023-03'
            ],
            [
                'id' => 103018,
                'id_pedido' => 98307,
                'id_formapagto' => 3,
                'qtd_parcelas' => 1,
                'retorno_intermediador' => null,
                'data_processamento' => null,
                'num_cartao' => '4275824466404380',
                'nome_portador' => 'Fernando Julio',
                'codigo_verificacao' => '482',
                'vencimento' => '2022-05'
            ],
            [
                'id' => 103019,
                'id_pedido' => 98308,
                'id_formapagto' => 3,
                'qtd_parcelas' => 5,
                'retorno_intermediador' => null,
                'data_processamento' => null,
                'num_cartao' => '5167913943407160',
                'nome_portador' => 'Kevin Pedro',
                'codigo_verificacao' => '441',
                'vencimento' => '2022-10'
            ],
            [
                'id' => 103020,
                'id_pedido' => 98309,
                'id_formapagto' => 2,
                'qtd_parcelas' => 1,
                'retorno_intermediador' => null,
                'data_processamento' => null,
                'num_cartao' => null,
                'nome_portador' => null,
                'codigo_verificacao' => null,
                'vencimento' => null
            ],
            [
                'id' => 103021,
                'id_pedido' => 98310,
                'id_formapagto' => 1,
                'qtd_parcelas' => 1,
                'retorno_intermediador' => null,
                'data_processamento' => null,
                'num_cartao' => null,
                'nome_portador' => null,
                'codigo_verificacao' => null,
                'vencimento' => null
            ],
        ]);
    }
}
