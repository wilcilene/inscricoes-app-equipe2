@extends('layouts.app')
@section('conteudo')

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
                    <label class="form-label">
                        Nome Completo:
                    </label>

                    <input class="form-control"
                           value="{{ Auth::user()->name }}"
                           readonly>
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        Email:
                    </label>

                    <input class="form-control"
                           value="{{ Auth::user()->email }}"
                           readonly>
                </div>

                <div class="mt-3">
                    <small class="text-muted">
                        Atualize os dados de cadastro antes de confirmar a inscrição
                    </small>
                    <br>

                    <button type="button"
                            class="btn btn-secondary btn-sm mt-2">
                        Cadastro
                    </button>
                </div>

            </div>

        </div>

        <!-- DOCUMENTOS -->
        <div class="card shadow-sm">

            <div class="card-header bg-white">
                <h5 class="fw-bold mb-0">
                    Documentos
                </h5>
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
                            'titulo'=>'Comprovante de habilitação na área',
                            'nome'=>''
                        ],

                        'comprovante_eleitoral'=>[
                            'titulo'=>'Comprovante de Quitação Eleitoral',
                            'nome'=>''
                        ],

                        'ficha_inscricao'=>[
                            'titulo'=>'Ficha de Inscrição',
                            'nome'=>''
                        ],

                        'curriculo_lattes'=>[
                            'titulo'=>'Currículo Lattes - Exportado',
                            'nome'=>''
                        ],

                        'identidade'=>[
                            'titulo'=>'Documento de Identificação',
                            'nome'=>''
                        ],

                        'certificado_militar'=>[
                            'titulo'=>'Certificado Militar',
                            'nome'=>''
                        ]

                    ];

                    @endphp

                    @foreach($documentos as $campo=>$doc)

                    <div class="col-md-6">

                        <div class="border rounded p-3">

                            <div class="d-flex justify-content-between align-items-center">

                                <div>

                                    <strong>
                                        {{ $doc['titulo'] }}
                                    </strong>

                                    <div class="small text-muted mt-2"
                                         id="nome_{{ $campo }}">

                                        @if($doc['nome'])
                                            📄 {{ $doc['nome'] }}
                                        @else
                                            Nenhum arquivo anexado
                                        @endif

                                    </div>

                                </div>

                                <label class="btn btn-light border">

                                    📁 Anexar

                                    <input type="file"
                                           name="{{ $campo }}"
                                           hidden
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