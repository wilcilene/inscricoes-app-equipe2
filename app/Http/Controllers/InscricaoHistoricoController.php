<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InscricaoHistorico;
use App\Models\Inscricao;
class InscricaoHistoricoController extends Controller
{
 
    public function observacao($id){
    $inscricao = Inscricao::findOrFail($id);
    return view('inscricoes.retorno', compact('inscricao'));
    }

    public function store(Request $request){
        $request->validate([
            'observacao' => 'required|string|max:400',
            'inscricao_id'=> 'required|exists:inscricaos,id',
        ]);
        $observacao = $request->observacao; 
        $inscricao_id = $request->inscricao_id;
        $inscricao_status_id= 2;
    
    InscricaoHistorico::create([
        "observacao"=> $observacao,
        "inscricao_id"=> $inscricao_id,
        "inscricao_status_id"=> $inscricao_status_id
    ]);
    }
    
}
