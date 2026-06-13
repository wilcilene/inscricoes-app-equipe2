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
            <th class="text-uppercase fw-semibold text-secondary border-bottom border-2 px-3 py-3" style="font-size: 0.88rem; letter-spacing: 0.04em; white-space: nowrap;">ID</th>
            <th class="text-uppercase fw-semibold text-secondary border-bottom border-2 px-3 py-3" style="font-size: 0.88rem; letter-spacing: 0.04em; white-space: nowrap;">Edital</th>
            <th class="text-uppercase fw-semibold text-secondary border-bottom border-2 px-3 py-3" style="font-size: 0.88rem; letter-spacing: 0.04em; white-space: nowrap;">Descrição</th>
            <th class="text-uppercase fw-semibold text-secondary border-bottom border-2 px-3 py-3" style="font-size: 0.88rem; letter-spacing: 0.04em; white-space: nowrap;">Cadastro</th>
            <th class="text-uppercase fw-semibold text-secondary border-bottom border-2 px-3 py-3" style="font-size: 0.88rem; letter-spacing: 0.04em; white-space: nowrap;">Situação</th>
            <th class="text-uppercase fw-semibold text-secondary border-bottom border-2 px-3 py-3" style="font-size: 0.88rem; letter-spacing: 0.04em; white-space: nowrap;">Ação</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="px-3 py-3 fw-semibold text-secondary align-middle" style="font-size: 0.92rem; font-variant-numeric: tabular-nums;">0001</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">01/2024</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">CHAMADA PÚBLICA – DOCENTE</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">06/02/2023</td>
            <td class="px-3 py-3 align-middle">
              <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background-color: #add44b; font-size: 0.8rem; min-width: 84px;">Pendente</span>
            </td>
            <td class="px-3 py-3 align-middle">
              <button class="btn btn-sm btn-link text-secondary p-1 rounded" title="Editar" style="font-size: 1.1rem; text-decoration: none;">
                <i class="bi bi-pencil-square"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td class="px-3 py-3 fw-semibold text-secondary align-middle" style="font-size: 0.92rem; font-variant-numeric: tabular-nums;">0002</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">20/2026</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">CHAMADA PÚBLICA – DOCENTE</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">01/09/2025</td>
            <td class="px-3 py-3 align-middle">
              <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background-color: #61eb6e;   font-size: 0.8rem; min-width: 84px;">Aprovado</span>
            </td>
            <td class="px-3 py-3 align-middle">
              <button class="btn btn-sm btn-link text-secondary p-1 rounded" title="Editar" style="font-size: 1.1rem; text-decoration: none;">
                <i class="bi bi-pencil-square"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td class="px-3 py-3 fw-semibold text-secondary align-middle" style="font-size: 0.92rem; font-variant-numeric: tabular-nums;">0003</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">10/2026</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">CHAMADA PÚBLICA – DOCENTE</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">29/04/2026</td>
            <td class="px-3 py-3 align-middle">
              <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background-color: #d40b0b; font-size: 0.8rem; min-width: 84px;">Rejeitado</span>
            </td>
            <td class="px-3 py-3 align-middle">
              <button class="btn btn-sm btn-link text-secondary p-1 rounded" title="Editar" style="font-size: 1.1rem; text-decoration: none;">
                <i class="bi bi-pencil-square"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td class="px-3 py-3 fw-semibold text-secondary align-middle" style="font-size: 0.92rem; font-variant-numeric: tabular-nums;">0004</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">15/2026</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">CHAMADA PÚBLICA – DOCENTE</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">29/04/2026</td>
            <td class="px-3 py-3 align-middle">
              <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background-color: #add44b; font-size: 0.8rem; min-width: 84px;">Pendente</span>
            </td>
            <td class="px-3 py-3 align-middle">
              <button class="btn btn-sm btn-link text-secondary p-1 rounded" title="Editar" style="font-size: 1.1rem; text-decoration: none;">
                <i class="bi bi-pencil-square"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td class="px-3 py-3 fw-semibold text-secondary align-middle" style="font-size: 0.92rem; font-variant-numeric: tabular-nums;">0005</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">44/2026</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">CHAMADA PÚBLICA – DOCENTE</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">29/04/2026</td>
            <td class="px-3 py-3 align-middle">
              <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background-color: #add44b; font-size: 0.8rem; min-width: 84px;">Pendente</span>
            </td>
            <td class="px-3 py-3 align-middle">
              <button class="btn btn-sm btn-link text-secondary p-1 rounded" title="Editar" style="font-size: 1.1rem; text-decoration: none;">
                <i class="bi bi-pencil-square"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td class="px-3 py-3 fw-semibold text-secondary align-middle" style="font-size: 0.92rem; font-variant-numeric: tabular-nums;">0006</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">44/2026</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">CHAMADA PÚBLICA – DOCENTE</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">29/04/2026</td>
            <td class="px-3 py-3 align-middle">
              <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background-color: #1575cf; font-size: 0.8rem; min-width: 84px;">Devolvido</span>
            </td>
            <td class="px-3 py-3 align-middle">
              <button class="btn btn-sm btn-link text-secondary p-1 rounded" title="Editar" style="font-size: 1.1rem; text-decoration: none;">
                <i class="bi bi-pencil-square"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td class="px-3 py-3 fw-semibold text-secondary align-middle" style="font-size: 0.92rem; font-variant-numeric: tabular-nums;">0007</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">44/2026</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">CHAMADA PÚBLICA – DOCENTE</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">29/04/2026</td>
            <td class="px-3 py-3 align-middle">
              <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background-color: #61eb6e; font-size: 0.8rem; min-width: 84px;">Aprovado</span>
            </td>
            <td class="px-3 py-3 align-middle">
              <button class="btn btn-sm btn-link text-secondary p-1 rounded" title="Editar" style="font-size: 1.1rem; text-decoration: none;">
                <i class="bi bi-pencil-square"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td class="px-3 py-3 fw-semibold text-secondary align-middle" style="font-size: 0.92rem; font-variant-numeric: tabular-nums;">0008</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">44/2026</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">CHAMADA PÚBLICA – DOCENTE</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">29/04/2026</td>
            <td class="px-3 py-3 align-middle">
              <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background-color: #d40b0b; font-size: 0.8rem; min-width: 84px;">Rejeitado</span>
            </td>
            <td class="px-3 py-3 align-middle">
              <button class="btn btn-sm btn-link text-secondary p-1 rounded" title="Editar" style="font-size: 1.1rem; text-decoration: none;">
                <i class="bi bi-pencil-square"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td class="px-3 py-3 fw-semibold text-secondary align-middle" style="font-size: 0.92rem; font-variant-numeric: tabular-nums;">0009</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">15/2026</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">CHAMADA PÚBLICA – DOCENTE</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">29/04/2026</td>
            <td class="px-3 py-3 align-middle">
              <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background-color: #add44b; font-size: 0.8rem; min-width: 84px;">Pendente</span>
            </td>
            <td class="px-3 py-3 align-middle">
              <button class="btn btn-sm btn-link text-secondary p-1 rounded" title="Editar" style="font-size: 1.1rem; text-decoration: none;">
                <i class="bi bi-pencil-square"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td class="px-3 py-3 fw-semibold text-secondary align-middle" style="font-size: 0.92rem; font-variant-numeric: tabular-nums;">0010</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">15/2026</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">CHAMADA PÚBLICA – DOCENTE</td>
            <td class="px-3 py-3 align-middle" style="font-size: 0.92rem;">29/04/2026</td>
            <td class="px-3 py-3 align-middle">
              <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background-color: #add44b; font-size: 0.8rem; min-width: 84px;">Pendente</span>
            </td>
            <td class="px-3 py-3 align-middle">
              <button class="btn btn-sm btn-link text-secondary p-1 rounded" title="Editar" style="font-size: 1.1rem; text-decoration: none;">
                <i class="bi bi-pencil-square"></i>
              </button>
            </td>
          </tr>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
@endsection