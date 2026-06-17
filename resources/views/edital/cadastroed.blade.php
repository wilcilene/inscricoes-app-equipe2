@extends('layouts.app')

@section('title', 'Cadastro de Edital')

@section('sidebar-links')
<li class="nav-item">
    <a href="{{ route('inicio') }}" class="nav-link text-white"> ⌂ Início</a>
</li>

@endsection

@section('conteudo')

    <h2 class="mb-1">Cadastro de Edital</h2>
    <p class="text-muted mb-4">Cadastre ou altere o edital.</p>

    <h6 class="fw-bold mb-3">Dados do Edital</h6>
    <hr>

    @if(session('sucesso'))
        <div class="alert alert-success">{{ session('sucesso') }}</div>
    @endif

    <form action="{{ route('edital.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nome do Edital</label>
            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                   placeholder="Preencher" value="{{ old('nome') }}">
            @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Data Início Inscrição</label>
                <input type="date" name="data_inicio_inscr" class="form-control @error('data_inicio_inscr') is-invalid @enderror"
                       value="{{ old('data_inicio_inscr') }}">
                @error('data_inicio_inscr') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Data Fim Inscrição</label>
                <input type="date" name="data_fim_inscr" class="form-control @error('data_fim_inscr') is-invalid @enderror"
                       value="{{ old('data_fim_inscr') }}">
                @error('data_fim_inscr') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Data Início Revisão</label>
                <input type="date" name="data_inicio_rev" class="form-control"
                       value="{{ old('data_inicio_rev') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Data Fim Revisão</label>
                <input type="date" name="data_fim_rev" class="form-control"
                       value="{{ old('data_fim_rev') }}">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control" rows="6"
                      placeholder="Preencher">{{ old('descricao') }}</textarea>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success px-4">Confirmar</button>
        </div>

    </form>

@endsection