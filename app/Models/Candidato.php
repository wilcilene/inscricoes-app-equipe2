<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $table = 'candidatos';

    protected $fillable = [
        'cpf',
        'nome_social',
        'genero',
        'naturalidade',
        'mae',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'estado',
        'cidade',
        'telefone',
        'data_nascimento',
        'usuario_id',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
    ];
}
