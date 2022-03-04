<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormasPagamento extends Model
{
    use HasFactory;

    protected $table = 'formas_pagamento';

    protected $fillable = [
        'descricao'
    ];

    protected $visible = [
        'descricao'
    ];
}
