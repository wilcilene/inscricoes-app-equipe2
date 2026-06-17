<?php
namespace App\Http\Controllers;

use App\Models\Inscricao;

class InscricaoController extends Controller
{
public function index($id)
{
    $inscricao = Inscricao::with('candidato')->findOrFail($id);
    return view('inscricoes.detalhesinscr', compact('inscricao'));
}
}