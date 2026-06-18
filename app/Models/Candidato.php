<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;
    protected $fillable = [
        'cpf', 'data_nascimento', 'nome_social', 'genero', 'naturalidade',
        'mae', 'cep', 'logradouro', 'numero', 'complemento',
        'bairro', 'estado', 'telefone', 'cidade', 'usuario_id'
    ];

    protected $casts = ['data_nascimento' => 'date'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function inscricoes()
    {
        return $this->hasMany(Inscricao::class, 'candidato_id');
    }
} 