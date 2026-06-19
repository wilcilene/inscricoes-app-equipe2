@extends('layouts.app')
@section('conteudo')
<div class="container py-5" style="max-width: 980px;">
  <h1 class="fw-bold fs-2 mb-0" style="letter-spacing: -0.5px;">MINHAS INSCRIÇÕES</h1>
  <p class="text-secondary mb-4" style="font-size: 0.95rem;">Acompanhe o status da sua inscrição</p>

  <div class="card border rounded-3 shadow-sm overflow-hidden">
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead class="table-light">
          <tr>
            <th class="text-uppercase fw-semibold text-secondary border-bottom border-2 px-3 py-3" style="font-size: 0.88rem; le0tter-spacing: 0.04em; white-space: nowrap;">ID</th>
            <th class="text-uppercase fw-semibold text-secondary border-bottom border-2 px-3 py-3" style="font-size: 0.88rem; letter-spacing: 0.04em; white-space: nowrap;">Edital</th>
            <th class="text-uppercase fw-semibold text-secondary border-bottom border-2 px-3 py-3" style="font-size: 0.88rem; letter-spacing: 0.04em; white-space: nowrap;">Descrição</th>
            <th class="text-uppercase fw-semibold text-secondary border-bottom border-2 px-3 py-3" style="font-size: 0.88rem; letter-spacing: 0.04em; white-space: nowrap;">Cadastro</th>
            <th class="text-uppercase fw-semibold text-secondary border-bottom border-2 px-3 py-3" style="font-size: 0.88rem; letter-spacing: 0.04em; white-space: nowrap;">Situação</th>
            <th class="text-uppercase fw-semibold text-secondary border-bottom border-2 px-3 py-3" style="font-size: 0.88rem; letter-spacing: 0.04em; white-space: nowrap;">Ação</th>
          </tr>
        </thead>  
          <tbody>
           @forelse($inscricoes as $inscricao)
        <tr>
            <td>{{ $inscricao->id }}</td>
            <td>{{ $inscricao->edital->nome ?? 'N/A' }}</td>
            <td>{{ $inscricao->edital->descricao ?? 'N/A' }}</td>
            <td>{{ $inscricao->created_at->format('d/m/Y H:i') }}</td>
            
            
        </tr>
        @empty
        <tr>
          </tbody>
            <td colspan="5">Nenhuma inscrição encontrada.</td>
        </tr>
        @endforelse
        
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