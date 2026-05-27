<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Edital;

class EditalController extends Controller
{
    /*
    public function listar (){
        $editais = Edital::all();
        dd($editais);
        }*/

    public function envio_de_edital (Request $request){
    $edital = new Edital();
    $edital->nome = $request->input('nome');
    $edital->descricao = $request->input('descricao');
    $edital->data_inicio_inscr = $request->input('data_inicio_inscr');
    $edital->data_fim_inscr = $request->input('data_fim_inscr');
    $edital->data_inicio_rev = $request->input('data_inicio_rev');
    $edital->data_fim_rev = $request->input('data_fim_rev');
    $edital->save();
    
    return view('edital.formulario');

    }

    public function enviar(){
        return view('edital.formulario');
    }
}
