@extends('layouts.app')
@section('conteudo')
@if(session('sucesso'))
    <div id="alerta-sucesso"
         class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-3"
         style="z-index: 9999;"
         role="alert">
        ✅ {{ session('sucesso') }}
        <button type="button"
                class="btn-close"
                onclick="fecharAlerta('alerta-sucesso')">
        </button>
    </div>
@endif
@if(session('erro'))
    <div id="alerta-erro"
         class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0 m-3"
         style="z-index: 9999;"
         role="alert">
        ❌ {{ session('erro') }}
        <button type="button"
                class="btn-close"
                onclick="fecharAlerta('alerta-erro')">
        </button>
    </div>
@endif
@php
    $candidato = Auth::user()->candidato;
    $genero = $candidato->genero ?? '';
    $dataNascimento = $candidato->data_nascimento;
    $idade = $dataNascimento ? $dataNascimento->diffInYears(now()) : null;
    $precisaMilitar = strtolower($genero) === 'masculino' && $idade !== null && $idade < 45;
@endphp

<div class="container py-5" style="max-width: 980px;">

    <h1 class="fw-bold fs-2 mb-0">
        Inscrição
    </h1>

    <p class="text-secondary mb-4">
        Certifique-se de que os dados estão corretos
    </p>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ route('inscricao.store') }}"
          enctype="multipart/form-data">

        @csrf

        <input type="hidden" name="edital_id" value="1">
        <input type="hidden" name="candidato_id" value="1">

        <!-- DADOS PESSOAIS -->
        <div class="card shadow-sm mb-4">

            <div class="card-header bg-white">
                <h5 class="fw-bold mb-0">
                    Dados Pessoais
                </h5>
            </div>

            <div class="card-body row">

                <div class="col-md-6">
                    <label class="form-label">Nome Completo:</label>
                    <input class="form-control"
                           value="{{ Auth::user()->nome }}"
                           readonly>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email:</label>
                    <input class="form-control"
                           value="{{ Auth::user()->email }}"
                           readonly>
                </div>

                <div class="mt-3">
                    <small class="text-muted">
                        Atualize os dados de cadastro antes de confirmar a inscrição
                    </small>
                    <br>
                    <button type="button" class="btn btn-secondary btn-sm mt-2">
                        Cadastro
                    </button>
                </div>

            </div>

        </div>

        <!-- VAGAS ESPECIAIS -->
        <div class="card shadow-sm mb-4">

            <div class="card-header bg-white">
                <h5 class="fw-bold mb-0">Vagas Especiais</h5>
            </div>

            <div class="card-body">
                <p class="text-muted">Selecione caso deseje concorrer a uma vaga especial.</p>

                <div class="form-check mb-2">
                    <input class="form-check-input"
                           type="checkbox"
                           name="vaga_pcd"
                           id="vaga_pcd"
                           value="1">
                    <label class="form-check-label" for="vaga_pcd">
                        PCD — Pessoa com Deficiência
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           name="vaga_pniq"
                           id="vaga_pniq"
                           value="1">
                    <label class="form-check-label" for="vaga_pniq">
                        PNIQ — Pessoa Negra, Indígena e/ou Quilombola
                    </label>
                </div>

            </div>

        </div>

        <!-- DOCUMENTOS -->
        <div class="card shadow-sm">

            <div class="card-header bg-white">
                <h5 class="fw-bold mb-0">Documentos</h5>
            </div>

            <div class="card-body">

                <p class="text-muted">
                    Envie os documentos solicitados em formato PDF.
                    Tamanho máximo por arquivo: 5MB.
                </p>

                <div class="row g-3">

                    @php
                    $documentos = [
                        'diploma' => [
                            'titulo' => 'Comprovante de habilitação na área',
                            'nome' => '',
                            'desabilitado' => false
                        ],
                        'comprovante_eleitoral' => [
                            'titulo' => 'Comprovante de Quitação Eleitoral',
                            'nome' => '',
                            'desabilitado' => false
                        ],
                        'ficha_inscricao' => [
                            'titulo' => 'Ficha de Inscrição',
                            'nome' => '',
                            'desabilitado' => false
                        ],
                        'curriculo_lattes' => [
                            'titulo' => 'Currículo Lattes - Exportado',
                            'nome' => '',
                            'desabilitado' => false
                        ],
                        'identidade' => [
                            'titulo' => 'Documento de Identificação',
                            'nome' => '',
                            'desabilitado' => false
                        ],
                        'certificado_militar' => [
                            'titulo' => 'Certificado Militar',
                            'nome' => '',
                            'desabilitado' => !$precisaMilitar
                        ],
                    ];
                    @endphp

                    @foreach($documentos as $campo => $doc)

                    <div class="col-md-6">
                        <div class="border rounded p-3 {{ $doc['desabilitado'] ? 'bg-light opacity-75' : '' }}">
                            <div class="d-flex justify-content-between align-items-center">

                                <div>
                                    <strong>{{ $doc['titulo'] }}</strong>

                                    @if($campo === 'certificado_militar' && $doc['desabilitado'])
                                        <div class="small text-muted mt-1">
                                            Não exigido para seu perfil
                                        </div>
                                    @endif

                                    <div class="small text-muted mt-2 text-truncate" style="max-width: 200px;" id="nome_{{ $campo }}">
                                        @if($doc['nome'])
                                            📄 {{ $doc['nome'] }}
                                        @else
                                            Nenhum arquivo anexado
                                        @endif
                                    </div>
                                </div>

                                <label class="btn btn-light border {{ $doc['desabilitado'] ? 'disabled' : '' }}">
                                    📁 Anexar
                                    <input type="file"
                                           name="{{ $campo }}"
                                           hidden
                                           {{ $doc['desabilitado'] ? 'disabled' : '' }}
                                           onchange="mostrarArquivo(this,'nome_{{ $campo }}')">
                                </label>

                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>

            </div>

        </div>

        <!-- BOTÕES -->
        <div class="d-flex justify-content-center gap-3 mt-4">

            <button type="button"
                    id="btn-cancelar"
                    class="btn btn-secondary px-5">
                Cancelar
            </button>

            <button type="button"
                    id="btn-rascunho"
                    class="btn btn-outline-secondary px-5">
                Salvar Rascunho
            </button>

            <button type="submit"
                    class="btn btn-success px-5">
                Realizar Inscrição
            </button>

        </div>

    </form>

</div>

<script>
    
function fecharAlerta(id)
{
    const alerta = document.getElementById(id);
    if (alerta) {
        alerta.classList.remove('show');
        setTimeout(function() { alerta.remove(); }, 300);
    }
}

setTimeout(function() { fecharAlerta('alerta-sucesso'); }, 4000);
setTimeout(function() { fecharAlerta('alerta-erro'); }, 4000);

function mostrarArquivo(input, campo)
{
    if(input.files.length > 0)
    {
        document.getElementById(campo).innerHTML =
            "📄 " + input.files[0].name;
    }
}

// CANCELAR
document.getElementById('btn-cancelar').addEventListener('click', function() {
    document.querySelectorAll('input[type="file"]').forEach(function(input) {
        input.value = '';
        document.getElementById('nome_' + input.name).innerHTML = 'Nenhum arquivo anexado';
        localStorage.removeItem('rascunho_' + input.name);
    });
});

// SALVAR RASCUNHO
document.getElementById('btn-rascunho').addEventListener('click', function() {
    document.querySelectorAll('input[type="file"]').forEach(function(input) {
        if(input.files.length > 0)
        {
            localStorage.setItem('rascunho_' + input.name, input.files[0].name);
        }
    });

    alert('Rascunho salvo!');
});

// AO CARREGAR A PÁGINA — restaura nomes do rascunho
window.addEventListener('load', function() {
    document.querySelectorAll('input[type="file"]').forEach(function(input) {
        const nomeSalvo = localStorage.getItem('rascunho_' + input.name);

        if(nomeSalvo)
        {
            document.getElementById('nome_' + input.name).innerHTML =
                '📄 ' + nomeSalvo +
                ' <span class="text-warning small">(rascunho — reanexe o arquivo)</span>';
        }
    });
});

</script>

@endsection