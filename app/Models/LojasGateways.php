<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LojasGateways extends Model
{
    use HasFactory;

    protected $table = 'lojas_gateway';

    protected $fillable = [
        'id_loja',
        'id_gateway'
    ];

    protected $visible = [
        'id_loja',
        'id_gateway'
    ];

    public function gateways() {
        return $this->belongsTo(Gateways::class);
    }
}
