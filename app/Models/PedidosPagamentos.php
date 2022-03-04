<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidosPagamentos extends Model
{
    use HasFactory;

    protected $table = 'pedidos_pagamentos';

    protected $fillable = [
        'id_pedido',
        'id_formapagto',
        'qtd_parcelas',
        'retorno_intermediador',
        'data_processamento',
        'num_cartao',
        'nome_portador',
        'codigo_verificacao',
        'vencimento',
    ];

    protected $visible = [
        'id_pedido',
        'id_formapagto',
        'qtd_parcelas',
        'retorno_intermediador',
        'data_processamento',
        'num_cartao',
        'nome_portador',
        'codigo_verificacao',
        'vencimento',
    ];

    public function pedidos() {
        return $this->belongsTo(Pedidos::class);
    }

    public function formasPagamento() {
        return $this->belongsTo(FormasPagamento::class);
    }
}
