<?php

namespace App\Http\Controllers;

use App\Models\Edital;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EditalController extends Controller
{
    public function index()
    {
        $hoje = date("Y-m-d");
        $ehAdmin = auth()->user()->tipoUsuario->tipo_usuario == "admin";
        $editais = Edital::orderBy("data_inicio_inscr", "desc", "id")->get(); //pega os dados da tabela e guarda numa variavel
        return view("edital.mural", compact("editais", "ehAdmin", "hoje"));
    }

    public function removerEdital($id)
    {
        Edital::findOrFail($id)->delete();
        return redirect()->route("inicio");
    }
    public function create()
    {
        return view("edital.cadastroed");
    }

    public function editarEdital($id)
    {
        $edital = Edital::findOrFail($id);
        return view("edital.cadastroed", compact("edital"));
    }

    public function atualizarEdital(Request $request, $id)
    {
        $request->validate([
            "nome" => "required",
            "descricao" => "required",
        ]);

        $edital = Edital::findOrFail($id);

        $edital->update([
            "nome" => $request->nome,
            "descricao" => $request->descricao,
            "data_inicio_inscr" => $request->data_inicio_inscr,
            "data_fim_inscr" => $request->data_fim_inscr,
            "data_inicio_rev" => $request->data_inicio_rev,
            "data_fim_rev" => $request->data_fim_rev,
        ]);

        return redirect()->route("inicio");
    }

    public function store(Request $request)
    {
        $request->validate([
            "nome" => "required|string|max:255",
            "descricao" => "nullable|string",
            "data_inicio_inscr" => "required|date",
            "data_fim_inscr" =>
                "required|date|after_or_equal:data_inicio_inscr",
            "data_inicio_rev" => "nullable|date",
            "data_fim_rev" => "nullable|date|after_or_equal:data_inicio_rev",
        ]);

        Edital::create(
            $request->only([
                "nome",
                "descricao",
                "data_inicio_inscr",
                "data_fim_inscr",
                "data_inicio_rev",
                "data_fim_rev",
            ]),
        );

        return redirect()
            ->route("inicio")
            ->with("sucesso", "Edital cadastrado com sucesso!");
    }
}
