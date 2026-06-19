<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{

    protected $table = 'candidatos'; 

    public $timestamps = true; 
     
    protected $fillable = [
        'cpf', 'data_nascimento', 'nome_social', 'genero', 'naturalidade',
        'mae', 'cep', 'logradouro', 'numero', 'complemento',
        'bairro', 'estado', 'telefone', 'cidade', 'usuario_id'
    ];
    //casts = modlar objeto de data - carbon 
    protected $casts = ['data_nascimento' => 'date'];

    //relacao entre TABELAS!! - ELOQUENT 
    public function usuario()
    {
        //tabela users (model user.php) que guarda o id do usuario dono do regitro 
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
