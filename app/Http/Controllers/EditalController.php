<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Edital;
use Illuminate\Http\Request;

class EditalController extends Controller
{
    public function index()
    {
        $editais = Edital::all(); //pega os dados da tabela e guarda numa variavel
        return view("layouts.mural", compact("editais")); //envia a variavel edital como objeto para ser usada na view

        ///////CASO QUEIRAM TESTAR/////////
        ////so comentar a parte de cima e descomentar a de baixo////
        /* $editais = [
            (object) [
                "nome" => "Teste",
                "descricao" => "Descricao teste",
                "data_fim_inscr" => "2026-05-30",
            ],
            (object) [
                "nome" => "Bolsa de Pesquisa",
                "descricao" =>
                    "Processo seletivo para bolsas de iniciação científica.dhdhsjbcjsbdbcewuewycweydgew",
                "data_fim_inscr" => "2026-06-15",
            ],
            (object) [
                "nome" => "Chamada Pública 2",
                "descricao" =>
                    "Contratação temporária de professores substitutos.",
                "data_fim_inscr" => "2026-06-20",
            ],
            (object) [
                "nome" => "Chamada Pública ",
                "descricao" =>
                    "Contratação temporária de professores substitutos.",
                "data_fim_inscr" => "2026-06-20",
            ],
        ]; return view("layouts.mural", compact("editais"));
        */
    }
}
