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
       //só faz o envio se TODOS os espaços abaixo estiverem com arquivos
        $request->validate([
            'ficha_inscricao' => 'required|file|mimes:pdf',
            'identidade' => 'required|file|mimes:pdf',
            'diploma' => 'required|file|mimes:pdf',
            'curriculo_lattes' => 'required|file|mimes:pdf',
            'comprovante_eleitoral' => 'required|file|mimes:pdf',
            'certificado_militar' => 'required|file|mimes:pdf',
        ]);
        //Envia para storage/app/private [tem que mudar para enviar para storage/app/private/inscricoes/(id da inscrição)]
        $ficha = $request->file('ficha_inscricao')
            ->store('fichas', 'local');
        
        $identidade = $request->file('identidade')
            ->store('identidades', 'local');

        $diploma = $request->file('diploma')
            ->store('diplomas', 'local');

        $lattes = $request->file('curriculo_lattes')
            ->store('lattes', 'local');

        $eleitoral = $request->file('comprovante_eleitoral')
            ->store('eleitoral', 'local');

        $militar = $request->file('certificado_militar')
            ->store('militar', 'local');
           
        Inscricao::create([
            'caminho_fica_inscricao' => $ficha,
            'caminho_identidade' => $identidade,
            'caminho_diploma' => $diploma,
            'caminho_curriculo_lattes' => $lattes,
            'caminho_comprovante_eleitoral' => $eleitoral,
            'caminho_certificado_militar' => $militar,

            'vaga_pcd' => 0,
            'vaga_pniq' => 0,
             
            //mudar o id, esse aqui é apenas para teste
            'edital_id' => 1,
            'candidato_id' => 1,
        ]);

        return redirect('/inscricao');
    }
}
