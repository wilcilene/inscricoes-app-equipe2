@extends('cadastro.layout')

@section('content')

<div style="display:flex; justify-content:center; margin-top:60px;">
    <div class="card" style="max-width:500px; text-align:center; padding:48px 40px;">
        <div style="font-size:3rem; margin-bottom:16px;">✅</div>
        <h2 style="font-size:1.5rem; margin-bottom:10px;">Cadastro realizado!</h2>
        <p style="color:#555; margin-bottom:28px;">Seus dados foram registrados com sucesso.</p>
        <a href="{{ route('cadastro.etapa1') }}"
           style="background:#27ae60; color:#fff; padding:12px 32px; border-radius:6px; text-decoration:none; font-weight:600;">
            Novo Cadastro
        </a>
    </div>
</div>

@endsection
