<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $fillable = ['cpf', 'nome_social', 'genero', 'naturalidade', 'mae', 'cep', 'logradouro', 'numero', 'complemento', 'bairro', 'estado', 'telefone', 'cidade'];

}
