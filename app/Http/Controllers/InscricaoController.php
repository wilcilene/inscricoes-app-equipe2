<?php
namespace App\Http\Controllers;

use App\Models\Inscricao;

class InscricaoController extends Controller
{
    public function show($id)
{
    $inscricao = Inscricao::with('candidato.usuario', 'edital', 'historicos.status')->findOrFail($id);
    return view('inscricoes.detalhesinscr', compact('inscricao'));
}
}