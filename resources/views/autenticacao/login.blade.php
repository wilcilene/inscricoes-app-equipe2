@extends('layouts.auth')

@section('form')

<form method="POST" action="{{route('login')}}">
    @csrf 

     <div class="mb-3">
        <label class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" placeholder="Digite seu email" value="{{ old('email') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Senha</label>
        <input type="password" name="password" class="form-control" placeholder="Digite sua senha" required>
    </div>

    <div class="d-flex gap-2 mt-4">
        <a href="{{ route('cadastro.index') }}" class="btn btn-primary w-50">Cadastrar</a>
        <button type="submit" class="btn btn-success w-50">Entrar</button>
    </div>

</form>

@endsection