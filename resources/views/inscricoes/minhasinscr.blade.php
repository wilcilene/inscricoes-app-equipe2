@extends('layouts.app')
@section('conteudo')
<div class="container py-5" style="max-width: 980px;">
  @if($ehAdmin)
    <h1 class="fw-bold fs-2 mb-0" style="letter-spacing: -0.5px;">INSCRIÇÕES</h1>
    <p class="text-secondary mb-4" style="font-size: 0.95rem;">Gerencie as inscrições cadastradas no sistema</p>
  @else
    <h1 class="fw-bold fs-2 mb-0" style="letter-spacing: -0.5px;">MINHAS INSCRIÇÕES</h1>
    <p class="text-secondary mb-4" style="font-size: 0.95rem;">Acompanhe o status da sua inscrição</p>
  @endif

  <div class="card border rounded-3 shadow-sm overflow-hidden">
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead class="table-light">
          <tr>
            <th class="text-uppercase fw-semibold text-secondary border-bottom border-2 px-3 py-3" style="font-size: 0.88rem; letter-spacing: 0.04em; white-space: nowrap;">ID</th>
            <th class="text-uppercase fw-semibold text-secondary border-bottom border-2 px-3 py-3" style="font-size: 0.88rem; letter-spacing: 0.04em; white-space: nowrap;">Edital</th>
            <th class="text-uppercase fw-semibold text-secondary border-bottom border-2 px-3 py-3" style="font-size: 0.88rem; letter-spacing: 0.04em; white-space: nowrap;">Descrição</th>
            <th class="text-uppercase fw-semibold text-secondary border-bottom border-2 px-3 py-3" style="font-size: 0.88rem; letter-spacing: 0.04em; white-space: nowrap;">Cadastro</th>
            <th class="text-uppercase fw-semibold text-secondary border-bottom border-2 px-3 py-3 text-center" style="font-size: 0.88rem; letter-spacing: 0.04em; white-space: nowrap;">Situação</th>
            <th class="text-uppercase fw-semibold text-secondary border-bottom border-2 px-3 py-3 text-center" style="font-size: 0.88rem; letter-spacing: 0.04em; white-space: nowrap;">Ação</th>
          </tr>
        </thead>  
        <tbody>
          @forelse($inscricoes as $inscricao)
            <tr>
              <td class="px-3 py-3 align-middle">{{ $inscricao->id }}</td>
              <td class="px-3 py-3 align-middle">{{ $inscricao->edital->nome ?? 'N/A' }}</td>
              <td class="px-3 py-3 align-middle">{{ $inscricao->edital->descricao ?? 'N/A' }}</td>
              <td class="px-3 py-3 align-middle">{{ $inscricao->created_at->format('d/m/Y H:i') }}</td>
              
              <td class="text-center align-middle px-3 py-3">
                <span class="badge bg-secondary">
                  {{ $inscricao->historicos->last()?->status->status ?? 'Em Análise' }}
                </span>
              </td>
              
              <td class="text-center align-middle px-3 py-3">
                <a href="{{ route('inscricoes.index', $inscricao->id) }}" class="btn btn-secondary btn-sm d-inline-flex align-items-center justify-content-center rounded-2" style="width: 32px; height: 32px;" title="Visualizar Inscrição">
                  <i class="bi bi-pencil-square" style="font-size: 1.1rem;"></i>
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center text-muted py-4">Nenhuma inscrição encontrada.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="d-flex align-items-center justify-content-end gap-2 px-3 py-3 border-top bg-white" style="background-color: #fafafa !important;">
      <span class="text-secondary" style="font-size: 0.85rem;">1–10 de 12 Editais</span>
      <button class="btn btn-outline-secondary btn-sm d-flex align-items-center justify-content-center p-0 rounded-2" disabled aria-label="Página anterior" style="width: 34px; height: 34px;">
        <i class="bi bi-chevron-left"></i>
      </button>
      <button class="btn btn-outline-secondary btn-sm d-flex align-items-center justify-content-center p-0 rounded-2" aria-label="Próxima página" style="width: 34px; height: 34px;">
        <i class="bi bi-chevron-right"></i>
      </button>
    </div>
  </div>
</div>
@endsection