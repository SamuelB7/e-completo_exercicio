<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $with = ['clientes', 'pedidoSituacao'];

    protected $fillable = [
        'valor_total',
        'valor_frete',
        'data',
        'id_cliente',
        'id_loja',
        'id_situacao'
    ];

    protected $visible = [
        'valor_total',
        'valor_frete',
        'data',
        'id_cliente',
        'id_loja',
        'id_situacao'
    ];

    public function clientes() {
        return $this->belongsTo(Clientes::class, 'id_cliente');
    }

    public function pedidoSituacao() {
        return $this->belongsTo(PedidoSituacao::class, 'id_situacao');
    }
}
