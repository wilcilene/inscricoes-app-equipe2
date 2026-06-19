@extends('layouts.app')

@section('title', 'Motivo da Rejeição')

@section('conteudo')
<h2 class="fw-bold">Motivo da Rejeição</h2>
<p class="text-muted">Insira o motivo da rejeição da inscrição.</p>

@if(session('sucesso'))
    <div class="alert alert-success">{{ session('sucesso') }}</div>
@endif
   
<form action="{{ route('rejeicao.store')}}" method="POST"> 
    @csrf
    <div class="mt-4">
        <input type="hidden" name="inscricao_id" value="{{$inscricao->id}}">
        <label class="form-label fs-5">Motivo da Rejeição:</label>
        <textarea 
            class="form-control @error('observacao') is-invalid @enderror"
            rows="12" 
            name="observacao" 
            placeholder="Digite detalhadamente o motivo do indeferimento...">{{ old('observacao') }}</textarea>
        @error('observacao')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex justify-content-end gap-2 mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary px-4">Voltar</a>
        <button type="submit" class="btn btn-success px-4">Confirmar</button>
    </div>
</form>
@endsection