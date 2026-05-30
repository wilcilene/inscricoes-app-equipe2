<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
     /*
     * Define quais atributos podem ser preenchidos em massa
     * através de métodos como create() e update().
     *
     * Os campos "caminho_*" armazenam os caminhos dos documentos
     * enviados pelo candidato no sistema de arquivos.
     *
     * Os campos "vaga_pcd" e "vaga_pniq" indicam se o candidato
     * está concorrendo a vagas reservadas.
     *
     * Os campos "edital_id" e "candidato_id" representam os
     * relacionamentos da inscrição com um edital e um candidato.
     */
    protected $fillable = [
        'caminho_fica_inscricao',
        'caminho_identidade',
        'caminho_diploma',
        'caminho_curriculo_lattes',
        'caminho_comprovante_eleitoral',
        'caminho_certificado_militar',
        'vaga_pcd',
        'vaga_pniq',
        'edital_id',
        'candidato_id',
    ];
}