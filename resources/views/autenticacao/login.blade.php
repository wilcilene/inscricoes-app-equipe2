@extends('layouts.auth')

@section('form')

<form action="{{route('logar')}}" method="post"> 
    

    <div class="mb-3">
        <label class="form-label">
            E-mail
        </label>

        <input
            type="email"
            name="email"
            class="form-control"
            placeholder="Digite seu email"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">
            Senha
        </label>

        <input
            type="password"
            name="password"
            class="form-control"
            placeholder="Digite sua senha"
            required>
    </div>

    <div class="d-flex gap-2 mt-4">

        <button
            type="button"
            class="btn btn-primary flex-fill">
            Cadastrar
        </button>

        <button
            type="submit"
            class="btn btn-success flex-fill">
            Entrar
        </button>

    </div>

</form>

@endsection