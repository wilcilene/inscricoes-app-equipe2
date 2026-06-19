<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CandidatoController extends Controller
{
    public function exibirFormulario(Request $request)
    {
        $etapa = (int) $request->query('etapa', 1);

        if ($etapa > 1 && !session()->has('cadastro_dados')) {
            return redirect()->route('cadastro.index', ['etapa'=>1]); 
        } 
        $dados = session()->get('cadastro_dados', []);

        return view('autenticacao.formulario', compact('etapa', 'dados'));
    }


    public function salvarEtapa1(Request $request)
    {
        $dadosValidados = $request->validate([
            'nome_completo'   => 'required|string|max:255',
            'nome_social'     => 'nullable|string|max:255',
            'cpf'             => 'required|string|max:15',
            'data_nascimento' => 'required|date',
            'genero'          => 'required|in:masculino,feminino,outro,prefiro_nao_informar',
            'naturalidade'    => 'required|string|max:255',
            'nome_mae'        => 'required|string|max:255',
        ], [
            'nome_completo.required'   => 'O nome completo é obrigatório.',
            'cpf.required'             => 'O CPF é obrigatório.',
            'data_nascimento.required' => 'A data de nascimento é obrigatória.',
            'data_nascimento.date'     => 'Informe uma data válida.',
            'genero.required'          => 'O gênero é obrigatório.',
            'naturalidade.required'    => 'A naturalidade é obrigatória.',
            'nome_mae.required'        => 'O nome da mãe é obrigatório.',

        ]); 
        
        session()->put('cadastro_dados', $dadosValidados); 
        return redirect()->route('cadastro.index', ['etapa'=>2]);
    }

        public function salvarEtapa2(Request $request)
        {
            $dadosValidados = $request->validate([
            'cep'         => 'required|string|max:12',
            'logradouro'  => 'required|string|max:255',
            'numero'      => 'required|string|max:10',
            'complemento' => 'nullable|string|max:255',
            'bairro'      => 'required|string|max:255',
            'estado'      => 'required|string|max:255',
            'cidade'      => 'required|string|max:255',
            'telefone'    => 'nullable|string|max:255',
        ], [
            'cep.required'        => 'O CEP é obrigatório.',
            'logradouro.required' => 'O logradouro é obrigatório.',
            'numero.required'     => 'O número é obrigatório.',
            'bairro.required'     => 'O bairro é obrigatório.',
            'estado.required'     => 'O estado é obrigatório.',
            'cidade.required'     => 'A cidade é obrigatória.',
        ]);
            

        $dadosExistentes = session()->get('cadastro_dados', []);
        $todosDados = array_merge($dadosExistentes, $dadosValidados);

        session()->put('cadastro_dados', $todosDados);
        
        return redirect()->route('cadastro.index', ['etapa'=>3]);
        }

    public function finalizar(Request $request)
    {
        $request->validate([
            'email'              => 'required|email|unique:users,email',
            'email_confirmation' => 'required|same:email',
            'password'           => 'required|min:8|confirmed',
        ], [
            'email.required'              => 'O e-mail é obrigatório.',
            'email.email'                 => 'Informe um e-mail válido.',
            'email.unique'                => 'Este e-mail já está cadastrado.',
            'email_confirmation.required' => 'Confirme o e-mail.',
            'email_confirmation.same'     => 'Os e-mails não coincidem.',
            'password.required'           => 'A senha é obrigatória.',
            'password.min'                => 'A senha deve ter no mínimo 8 caracteres.',
            'password.confirmed'          => 'As senhas não coincidem.',
        ]);

        $dadosSessao = session()->get('cadastro_dados', []);
        
        $novoUsuario = User::create([
            'nome'     => $dadosSessao['nome_completo'],
            'email'    => $request->email,
            'password' => $request->password,
            'tipo_usuario_id' => 1,
        ]);
        
        Candidato::create(array_merge($dadosSessao, [
        'usuario_id' => $novoUsuario->id,
        'mae' => $dadosSessao['nome_mae'], 
        ])); 
        
        session()->forget('cadastro_dados'); 

        return redirect()->route('login')->with('sucesso', 'Cadastro realizado! Seus dados forma salvos com sucesso! ');
    }
}

    