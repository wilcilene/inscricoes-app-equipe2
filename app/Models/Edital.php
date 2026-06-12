<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edital extends Model
{
    use HasFactory;
    protected $fillable = [
     'nome',
     'descricao',
     'data_inicio_inscr',
     'data_fim_inscr',
     'data_inicio_rev',
     'data_fim_rev',


    ];
}
