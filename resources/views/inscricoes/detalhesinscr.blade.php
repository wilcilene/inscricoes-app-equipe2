@extends('layouts.interna')
@section('candidato')
</div></div>
    
@php $c = $inscricao->candidato; @endphp

<div class="container py-4">
    <h1 class="fw-bold mb-4">Candidatura {{ $c->nome_social ?? $c->usuario->name ?? '-' }}</h1>

    <div class="card mb-4 shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div><small class="text-muted d-block">Edital No.</small><strong>{{ $inscricao->edital->numero ?? '-' }}</strong></div>
            <div><small class="text-muted d-block">Candidato</small><strong>{{ $c->nome_social ?? $c->usuario->name ?? '-' }}</strong></div>
            <div><small class="text-muted d-block">Data Submissão</small><strong>{{ $inscricao->created_at->format('d/m/Y') }}</strong></div>
            <span class="badge bg-danger fs-6 px-3 py-2">{{ $inscricao->historicos->last()?->status->status ?? 'Em Análise' }}</span>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6 d-flex flex-column gap-4">

            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Dados do candidato</h5>
                    <p class="mb-2"><strong>Nome completo:</strong> {{ $c->nome_social ?? $c->usuario->name ?? '-' }}</p>
                    <p class="mb-2"><strong>CPF:</strong> {{ $c->cpf ?? '-' }}</p>
                    <p class="mb-2"><strong>Data de nascimento:</strong> {{ $c->data_nascimento?->format('d/m/Y') ?? '-' }}</p>
                    <p class="mb-0"><strong>Sexo:</strong> {{ $c->genero ?? '-' }}</p>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Histórico</h5>
                    @forelse($inscricao->historicos as $h)
                        @php $aprovado = str_contains(strtolower($h->status->status ?? ''), 'aprov'); @endphp
                        <div class="border-start border-2 ps-3 mb-3 {{ $aprovado ? 'border-success' : '' }}">
                            <strong class="d-block {{ $aprovado ? 'text-success' : '' }}">
                                {{ $h->status->status ?? '-' }} - {{ $h->created_at->format('d/m/Y') }}
                            </strong>
                            <small class="{{ $aprovado ? 'text-success' : 'text-muted' }}">
                                {{ $h->observacao ?? '-' }}
                            </small>
                        </div>
                    @empty
                        <p class="text-muted">Nenhum histórico encontrado.</p>
                    @endforelse
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Documentos</h5>
                    @php
                    $docs = [
                        'Ficha de Inscrição'    => $inscricao->caminho_fica_inscricao,
                        'Identidade'            => $inscricao->caminho_identidade,
                        'Diploma'               => $inscricao->caminho_diploma,
                        'Currículo Lattes'      => $inscricao->caminho_curriculo_lattes,
                        'Comprovante Eleitoral' => $inscricao->caminho_comprovante_eleitoral,
                        'Certificado Militar'   => $inscricao->caminho_certificado_militar,
                    ];
                    @endphp
                    @foreach($docs as $tipo => $caminho)
                        @if($caminho)
                        <div class="d-flex justify-content-between align-items-center border rounded p-3 mb-3">
                            <div>
                                <div class="fw-semibold">{{ $tipo }} <span class="text-success">✓</span></div>
                                <small class="text-muted">📄 {{ basename($caminho) }}</small>
                            </div>
                            <a href="{{ url('/' . $caminho) }}" target="_blank" class="btn btn-outline-secondary btn-sm">📁 Visualizar</a>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="{{ url()->previous() }}" class="btn btn-success px-5 py-2 fw-semibold">Retornar</a>
    </div>
</div>

<div><div>
@endsection