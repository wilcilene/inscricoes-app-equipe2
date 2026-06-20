<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use App\Models\Edital;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscricao;
use Illuminate\Support\Facades\Auth;

class InscricaoController extends Controller
{
    public function index($id)
    {
        $inscricao = Inscricao::with(
            "candidato.usuario",
            "edital",
            "historicos.status",
        )->findOrFail($id);
        $inscricao = Inscricao::with("candidato")->findOrFail($id);
        return view("inscricoes.detalhesinscr", compact("inscricao"));
    }
    public function create()
    {
        return view("inscricoes.uploads");
    }

    public function store(Request $request)
    {
        $candidato = Auth::user()->candidato;
        $idade = $candidato->data_nascimento->diffInYears(now());
        $precisaMilitar =
            strtolower($candidato->genero) === "masculino" && $idade < 45;
        $request->validate([
            "ficha_inscricao" => "required|file|mimes:pdf",
            "identidade" => "required|file|mimes:pdf",
            "diploma" => "required|file|mimes:pdf",
            "curriculo_lattes" => "required|file|mimes:pdf",
            "comprovante_eleitoral" => "required|file|mimes:pdf",
            "certificado_militar" =>
                ($precisaMilitar ? "required" : "nullable") . "|file|mimes:pdf",
            "edital_id" => "required|exists:editals,id",
            "candidato_id" => "required|exists:candidatos,id",
        ]);

        try {
            $pasta = "inscricoes/edital_{$request->edital_id}_candidato_{$candidato->id}";

            $ficha = $request
                ->file("ficha_inscricao")
                ->storeAs($pasta, "ficha_inscricao.pdf", "local");
            $identidade = $request
                ->file("identidade")
                ->storeAs($pasta, "identidade.pdf", "local");
            $diploma = $request
                ->file("diploma")
                ->storeAs($pasta, "diploma.pdf", "local");
            $lattes = $request
                ->file("curriculo_lattes")
                ->storeAs($pasta, "curriculo_lattes.pdf", "local");
            $eleitoral = $request
                ->file("comprovante_eleitoral")
                ->storeAs($pasta, "comprovante_eleitoral.pdf", "local");

            // Só salva o certificado militar se for exigido
            $militar = $precisaMilitar
                ? $request
                    ->file("certificado_militar")
                    ->storeAs($pasta, "certificado_militar.pdf", "local")
                : null;
            // Segurança extra: se não precisa do certificado militar mas enviou um arquivo mesmo assim, ignora
            if (!$precisaMilitar) {
                $militar = null;
            }
            $inscricao = Inscricao::create([
                "caminho_fica_inscricao" => $ficha,
                "caminho_identidade" => $identidade,
                "caminho_diploma" => $diploma,
                "caminho_curriculo_lattes" => $lattes,
                "caminho_comprovante_eleitoral" => $eleitoral,
                "caminho_certificado_militar" => $militar,

                "vaga_pcd" => $request->boolean("vaga_pcd"),
                "vaga_pniq" => $request->boolean("vaga_pniq"),

                "edital_id" => $request->edital_id,
                "candidato_id" => $request->candidato_id,
            ]);
        } catch (\Exception $e) {
            if (isset($inscricao)) {
                $inscricao->delete();
            }

            return back()->with(
                "erro",
                "Erro ao enviar arquivos. Tente novamente.",
            );
        }

        return redirect("/inscricao")->with(
            "sucesso",
            "Inscrição realizada com sucesso!",
        );
    }
    public function listarMinhasInscricoes()
    {
        $inscricoes = Auth::user()->candidato->inscricoes;
        //dd($inscricoes);
        //$inscricoes = Inscricao::with('candidato.usuario', 'edital')->get();
        return view("inscricoes.minhasinscr", compact("inscricoes"));
    }
    public function realizarInscricao($id)
    {
        $edital = Edital::findOrFail($id);
        return view("inscricoes.uploads", compact("edital"));
    }
}
