<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosPagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_pagamentos', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('id_pedido')
                ->references('id')
                ->on('pedidos')
            ;

            $table->foreignId('id_formapagto')
                ->references('id')
                ->on('formas_pagamaneto')
            ;

            $table->integer('qtd_parcelas');
            $table->longText('retorno_intermediador');
            $table->longText('data_processamento');
            $table->longText('num_cartao');
            $table->longText('nome_portador');
            $table->integer('codigo_verificacao');
            $table->longText('vencimento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos_pagamentos');
    }
}
