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
}
