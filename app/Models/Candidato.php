<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $fillable = ['cpf', 'data_nascimento', 'usuario_id'];
}