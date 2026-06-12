<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InscricaoHistorico extends Model
{
    protected $table = 'inscricao_historicos';

    protected $fillable = ['inscricao_id', 'inscricao_status_id', 'observacao'];

    public function status()
    {
        return $this->belongsTo(InscricaoStatus::class, 'inscricao_status_id');
    }
}