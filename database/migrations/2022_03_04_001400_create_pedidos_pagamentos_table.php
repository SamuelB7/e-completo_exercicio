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
                ->onDelete('cascade')
            ;

            $table->foreignId('id_formapagto')
                ->references('id')
                ->on('formas_pagamento')
                ->onDelete('cascade')
            ;

            $table->integer('qtd_parcelas');
            $table->longText('retorno_intermediador')->nullable();
            $table->longText('data_processamento')->nullable();
            $table->longText('num_cartao')->nullable();
            $table->longText('nome_portador')->nullable();
            $table->string('codigo_verificacao')->nullable();
            $table->longText('vencimento')->nullable();
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
