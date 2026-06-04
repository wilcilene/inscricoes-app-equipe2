<?php

namespace App\Http\Controllers;

use App\Models\Edital;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditalController extends Controller
{
    public function index()
    {
        /*$editais = Edital::all(); //pega os dados da tabela e guarda numa variavel
         return view("edital.mural", compact("editais"));*/
        $editais = [
            (object) [
                "nome" => "Teste",
                "descricao" => "Descricao teste",
                "data_fim_inscr" => "2026-05-30",
            ],
            (object) [
                "nome" => "Bolsa de Pesquisa",
                "descricao" =>
                    "Processo seletivo para bolsas de iniciação científica.cnjnfjcnvhrbvhrbvhrbvhrbhgri3ytbtrgyrogb3yrbdhdhsjbcjsbdbcewuewycweydgew",
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
        ];
        return view("edital.mural", compact("editais"));
    }
}
