@extends('layouts.app')

@section('content')
<div style="max-width:900px; margin:0 auto; padding:2rem;">

    <h1>Candidatura</h1>
    <p>Detalhes da inscrição</p>

    <div style="display:flex; gap:2rem; background:#fff; border:1px solid #ddd; border-radius:8px; padding:1rem; margin:1rem 0; align-items:center;">
        <div>
            <small>Edital</small><br>
            <strong>{{ $candidatura->edital->nome }}</strong>
        </div>
        <div>
            <small>CPF do Candidato</small><br>
            <strong>{{ $candidatura->candidato->cpf }}</strong>
        </div>
        <div>
            <small>Data de Inscrição</small><br>
            <strong>{{ \Carbon\Carbon::parse($candidatura->created_at)->format('d/m/Y') }}</strong>
        </div>
        <div style="margin-left:auto;">
            <span style="background:red; color:#fff; padding:0.3rem 0.8rem; border-radius:4px; font-size:0.8rem; font-weight:bold;">
                EM ANÁLISE
            </span>
        </div>
    </div>

    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.5rem;">

        <div>
            <div style="background:#fff; border:1px solid #ddd; border-radius:8px; padding:1rem; margin-bottom:1rem;">
                <strong>Dados do candidato</strong>
                <hr>
                <p><small>CPF:</small> {{ $candidatura->candidato->cpf }}</p>
                <p><small>Data de nascimento:</small> {{ \Carbon\Carbon::parse($candidatura->candidato->data_nascimento)->format('d/m/Y') }}</p>
            </div>

            <div style="background:#fff; border:1px solid #ddd; border-radius:8px; padding:1rem;">
                <strong>Dados do Edital</strong>
                <hr>
                <p><small>Nome:</small> {{ $candidatura->edital->nome }}</p>
                <p><small>Descrição:</small> {{ $candidatura->edital->descricao }}</p>
                <p><small>Inscrições:</small> {{ \Carbon\Carbon::parse($candidatura->edital->data_inicio_inscr)->format('d/m/Y') }} até {{ \Carbon\Carbon::parse($candidatura->edital->data_fim_inscr)->format('d/m/Y') }}</p>
            </div>
        </div>

        <div style="background:#fff; border:1px solid #ddd; border-radius:8px; padding:1rem;">
            <strong>Documentos</strong>
            <hr>
            @if($candidatura->caminho_fica_inscricao)
            <div style="display:flex; justify-content:space-between; align-items:center; padding:0.5rem 0; border-bottom:1px solid #f0f0f0;">
                <div><span style="color:green;">●</span> Ficha de Inscrição</div>
            </div>
            @endif
            @if($candidatura->caminho_identidade)
            <div style="display:flex; justify-content:space-between; align-items:center; padding:0.5rem 0; border-bottom:1px solid #f0f0f0;">
                <div><span style="color:green;">●</span> Identidade</div>
            </div>
            @endif
            @if($candidatura->caminho_diploma)
            <div style="display:flex; justify-content:space-between; align-items:center; padding:0.5rem 0; border-bottom:1px solid #f0f0f0;">
                <div><span style="color:green;">●</span> Diploma</div>
            </div>
            @endif
            @if($candidatura->caminho_curriculo_lattes)
            <div style="display:flex; justify-content:space-between; align-items:center; padding:0.5rem 0; border-bottom:1px solid #f0f0f0;">
                <div><span style="color:green;">●</span> Currículo Lattes</div>
            </div>
            @endif
            @if($candidatura->caminho_comprovante_eleitoral)
            <div style="display:flex; justify-content:space-between; align-items:center; padding:0.5rem 0; border-bottom:1px solid #f0f0f0;">
                <div><span style="color:green;">●</span> Comprovante Eleitoral</div>
            </div>
            @endif
            @if($candidatura->caminho_certificado_militar)
            <div style="display:flex; justify-content:space-between; align-items:center; padding:0.5rem 0; border-bottom:1px solid #f0f0f0;">
                <div><span style="color:green;">●</span> Certificado Militar</div>
            </div>
            @endif
        </div>

    </div>

    <div style="text-align:center; margin-top:2rem;">
        <a href="{{ route('candidaturas.index') }}" class="btn btn-success btn-lg px-5">
            Retornar
        </a>
    </div>

</div>
@endsection