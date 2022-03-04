<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor_total', $precision = 12, $scale = 2);
            $table->decimal('valor_frete', $precision = 12, $scale = 2);
            $table->timestamp('data');

            $table->foreignId('id_cliente')
                ->references('id')
                ->on('clientes')
            ;

            $table->integer('id_loja');

            $table->foreignId('id_situacao')
                ->references('id')
                ->on('pedido_situacao')
            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
