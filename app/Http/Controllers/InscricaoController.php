<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscricao;

class InscricaoController extends Controller
{
    public function create()
    {
        return view('inscricao.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'ficha_inscricao' => 'required|file|mimes:pdf',
        'identidade' => 'required|file|mimes:pdf',
        'diploma' => 'required|file|mimes:pdf',
        'curriculo_lattes' => 'required|file|mimes:pdf',
        'comprovante_eleitoral' => 'required|file|mimes:pdf',
        'certificado_militar' => 'required|file|mimes:pdf',

        // adicionados
        'edital_id' => 'required|exists:editals,id',
        'candidato_id' => 'required|exists:candidatos,id',
    ]);

    try {

        // cria inscrição primeiro
        $inscricao = Inscricao::create([

            'caminho_fica_inscricao' => '',
            'caminho_identidade' => '',
            'caminho_diploma' => '',
            'caminho_curriculo_lattes' => '',
            'caminho_comprovante_eleitoral' => '',
            'caminho_certificado_militar' => '',

            'vaga_pcd' => 0,
            'vaga_pniq' => 0,

            'edital_id' => $request->edital_id,
            'candidato_id' => $request->candidato_id,
        ]);

        /*
         * Estrutura:
         *
         * storage/app/private/
         * └── inscricoes/
         *     └── {id_inscricao}/
         *         └── {id_candidato}/
         */
        $pasta =
            "inscricoes/" .
            $inscricao->id .
            "/" .
            $inscricao->candidato_id;

        $ficha = $request->file('ficha_inscricao')
            ->storeAs(
                "$pasta/ficha_inscricao",
                "ficha_inscricao.pdf",
                "local"
            );

        $identidade = $request->file('identidade')
            ->storeAs(
                "$pasta/identidade",
                "identidade.pdf",
                "local"
            );

        $diploma = $request->file('diploma')
            ->storeAs(
                "$pasta/diploma",
                "diploma.pdf",
                "local"
            );

        $lattes = $request->file('curriculo_lattes')
            ->storeAs(
                "$pasta/curriculo_lattes",
                "curriculo_lattes.pdf",
                "local"
            );

        $eleitoral = $request->file('comprovante_eleitoral')
            ->storeAs(
                "$pasta/comprovante_eleitoral",
                "comprovante_eleitoral.pdf",
                "local"
            );

        $militar = $request->file('certificado_militar')
            ->storeAs(
                "$pasta/certificado_militar",
                "certificado_militar.pdf",
                "local"
            );

        $inscricao->update([

            'caminho_fica_inscricao' => $ficha,
            'caminho_identidade' => $identidade,
            'caminho_diploma' => $diploma,
            'caminho_curriculo_lattes' => $lattes,
            'caminho_comprovante_eleitoral' => $eleitoral,
            'caminho_certificado_militar' => $militar,
        ]);

    } catch (\Exception $e) {

        if (isset($inscricao)) {
            $inscricao->delete();
        }

        return back()->with(
            'erro',
            'Erro ao enviar arquivos.'
        );
    }

    return redirect('/inscricao');
}
}
