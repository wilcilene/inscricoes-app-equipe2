<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Candidato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CadastroController extends Controller
{
    // -------------------------------------------------------
    // ETAPA 1 — Dados Pessoais
    // -------------------------------------------------------

    public function etapa1()
    {
        return view('cadastro.etapa1', [
            'dados' => session('cadastro.etapa1', []),
        ]);
    }

    public function salvarEtapa1(Request $request)
    {
        $validated = $request->validate([
            'nome_completo'    => 'required|string|max:255',
            'nome_social'      => 'nullable|string|max:255',
            'cpf'              => 'required|string|max:15',
            'data_nascimento'  => 'required|date',
            'genero'           => 'required|in:masculino,feminino,outro,prefiro_nao_informar',
            'naturalidade'     => 'required|string|max:255',
            'nome_mae'         => 'required|string|max:255',
        ], [
            'nome_completo.required'   => 'O nome completo é obrigatório.',
            'cpf.required'             => 'O CPF é obrigatório.',
            'data_nascimento.required' => 'A data de nascimento é obrigatória.',
            'data_nascimento.date'     => 'Informe uma data válida.',
            'genero.required'          => 'O gênero é obrigatório.',
            'naturalidade.required'    => 'A naturalidade é obrigatória.',
            'nome_mae.required'        => 'O nome da mãe é obrigatório.',
        ]);

        session(['cadastro.etapa1' => $validated]);

        return redirect()->route('cadastro.etapa2');
    }

    // -------------------------------------------------------
    // ETAPA 2 — Endereço e Contato
    // -------------------------------------------------------

    public function etapa2()
    {
        if (!session('cadastro.etapa1')) {
            return redirect()->route('cadastro.etapa1');
        }

        return view('cadastro.etapa2', [
            'dados' => session('cadastro.etapa2', []),
        ]);
    }

    public function salvarEtapa2(Request $request)
    {
        $validated = $request->validate([
            'cep'         => 'required|string|max:10',
            'logradouro'  => 'required|string|max:255',
            'numero'      => 'required|string|max:4',
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

        session(['cadastro.etapa2' => $validated]);

        return redirect()->route('cadastro.etapa3');
    }

    // -------------------------------------------------------
    // ETAPA 3 — Senha de Acesso
    // -------------------------------------------------------

    public function etapa3()
    {
        if (!session('cadastro.etapa1') || !session('cadastro.etapa2')) {
            return redirect()->route('cadastro.etapa1');
        }

        return view('cadastro.etapa3');
    }

    public function finalizar(Request $request)
    {
        $request->validate([
            'email'             => 'required|email|unique:users,email',
            'email_confirmation'=> 'required|same:email',
            'password'          => 'required|min:8|confirmed',
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

        $etapa1 = session('cadastro.etapa1');
        $etapa2 = session('cadastro.etapa2');

        // Salva na tabela users
        $user = Usuario::create([
            'nome'            => $etapa1['nome_completo'],
            'email'           => $request->email,
            'password'        => Hash::make($request->password),
            'tipo_usuario_id' => 1, // id do tipo candidato — ajustar se necessário
        ]);

        // Salva na tabela candidatos
        Candidato::create([
            'cpf'             => $etapa1['cpf'],
            'nome_social'     => $etapa1['nome_social'] ?? null,
            'genero'          => $etapa1['genero'],
            'naturalidade'    => $etapa1['naturalidade'],
            'mae'             => $etapa1['nome_mae'],
            'data_nascimento' => $etapa1['data_nascimento'],
            'cep'             => $etapa2['cep'],
            'logradouro'      => $etapa2['logradouro'],
            'numero'          => $etapa2['numero'],
            'complemento'     => $etapa2['complemento'] ?? null,
            'bairro'          => $etapa2['bairro'],
            'estado'          => $etapa2['estado'],
            'cidade'          => $etapa2['cidade'],
            'telefone'        => $etapa2['telefone'] ?? null,
            'usuario_id'      => $user->id,
        ]);

        session()->forget('cadastro');

        return redirect()->route('cadastro.sucesso');
    }

    // -------------------------------------------------------
    // Sucesso
    // -------------------------------------------------------

    public function sucesso()
    {
        return view('cadastro.sucesso');
    }

    // -------------------------------------------------------
    // Cancelar
    // -------------------------------------------------------

    public function cancelar()
    {
        session()->forget('cadastro');
        return redirect()->route('cadastro.etapa1');
    }
}
