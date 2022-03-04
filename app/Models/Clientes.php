<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'cpf_cnpj',
        'email',
        'tipo_pessoa',
        'data_nasc',
        'id_loja'
    ];

    protected $visible = [
        'nome',
        'cpf_cnpj',
        'email',
        'tipo_pessoa',
        'data_nasc',
        'id_loja'
    ];
}
