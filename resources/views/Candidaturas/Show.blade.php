<x-app-layout>
<div class="container py-4">

    <h4 class="fw-semibold mb-1">Candidatura</h4>
    <p class="text-muted small mb-4">Detalhes da inscrição</p>

    <div class="card p-3 mb-4 d-flex flex-row flex-wrap align-items-center gap-4">
        <div><small class="text-muted d-block">Edital</small><strong>{{ $candidatura->edital->nome }}</strong></div>
        <div><small class="text-muted d-block">CPF</small><strong>{{ $candidatura->candidato->cpf }}</strong></div>
        <div><small class="text-muted d-block">Data</small><strong>{{ \Carbon\Carbon::parse($candidatura->created_at)->format('d/m/Y') }}</strong></div>
        <div class="ms-auto"><span class="badge bg-danger">EM ANÁLISE</span></div>
    </div>

    <div class="row g-4">

        <div class="col-6">
            <div class="card p-3">
                <strong>Dados do candidato</strong>
                <hr>
                <p class="mb-1 small"><span class="text-muted">CPF:</span> {{ $candidatura->candidato->cpf }}</p>
                <p class="mb-0 small"><span class="text-muted">Nascimento:</span> {{ \Carbon\Carbon::parse($candidatura->candidato->data_nascimento)->format('d/m/Y') }}</p>
            </div>
        </div>

        <div class="col-6">
            <div class="card p-3">
                <strong>Documentos</strong>
                <hr>
                @foreach(['caminho_fica_inscricao' => 'Ficha de Inscrição', 'caminho_identidade' => 'Identidade', 'caminho_diploma' => 'Diploma', 'caminho_curriculo_lattes' => 'Lattes', 'caminho_comprovante_eleitoral' => 'Eleitoral', 'caminho_certificado_militar' => 'Militar'] as $campo => $label)
                    @if($candidatura->$campo)
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span class="small"><span class="text-success">●</span> {{ $label }}</span>
                        <a href="{{ $candidatura->$campo }}" target="_blank" class="btn btn-sm btn-outline-secondary">Visualizar</a>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>

    </div>

    <div class="text-center mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-success btn-lg px-5">Retornar</a>
    </div>

</div>
</x-app-layout>