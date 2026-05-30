<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inscricao; 
use Illuminate\Http\Request;

class InscricaoController extends Controller
{
public function show(Inscricao $inscricao)
{
    $inscricao->load([
        'candidato',
        'edital',
    ]);

    return view('candidaturas.show', ['candidatura' => $inscricao]);
}
}