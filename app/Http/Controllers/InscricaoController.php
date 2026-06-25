<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Edital;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscricao;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Importação do modelo User adicionada

class InscricaoController extends Controller
{
    public function create()
    {
        return view("inscricoes.uploads");
    }

    public function store(Request $request)
    {
        /** @var User $usuario */
        $usuario = Auth::user();
        $candidato = $usuario->candidato;

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
            $pasta = "inscricoes/edital_{$request->edital_id}candidato{$candidato->id}";

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

            $militar = $precisaMilitar
                ? $request
                    ->file("certificado_militar")
                    ->storeAs($pasta, "certificado_militar.pdf", "local")
                : null;

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
        /** @var User $usuario */
        $usuario = Auth::user();

        // Define se é admin usando o seu padrão (is_admin == 2)
        $ehAdmin = $usuario && $usuario->tipo_usuario_id == 2;

        if ($ehAdmin) {
            $inscricoes = Inscricao::with([
                "edital",
                "historicos.status",
            ])->get();
        } else {
            $inscricoes =
                $usuario && $usuario->candidato
                    ? $usuario->candidato
                        ->inscricoes()
                        ->with(["edital", "historicos.status"])
                        ->get()
                    : collect();
        }

        return view("inscricoes.minhasinscr", compact("inscricoes", "ehAdmin"));
    }

    public function realizarInscricao($id)
    {
        $edital = Edital::findOrFail($id);
        return view("inscricoes.uploads", compact("edital"));
    }

    public function index($id)
    {
        $inscricao = Inscricao::with(
            "candidato.usuario",
            "edital",
            "historicos.status",
        )->findOrFail($id);

        /** @var User $usuario */
        $usuario = Auth::user();
        $ehAdmin = $usuario && $usuario->tipo_usuario_id == 2;
        dd("oi");

        return view(
            "inscricoes.detalhesinscr",
            compact("inscricao", "ehAdmin"),
        );
    }

    public function show($id)
    {
        $inscricao = Inscricao::with(
            "candidato.usuario",
            "edital",
            "historicos.status",
        )->findOrFail($id);

        /** @var User $usuario */
        $usuario = Auth::user();
        $ehAdmin = $usuario && $usuario->tipo_usuario_id == 2;

        return view(
            "inscricoes.detalhesinscr",
            compact("inscricao", "ehAdmin"),
        );
    }
}
