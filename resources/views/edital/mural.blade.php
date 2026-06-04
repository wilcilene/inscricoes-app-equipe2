@extends("layouts.app")

@section("script")
    @vite('resources/js/mural.js')
@endsection

@section("style")
    @vite('resources/css/mural.css')
@endsection

@section("conteudo")

    <div class="mural-container">
        <div class="mural-wrap">

            <div class="mural-header">

                <div class="titulo-subtitulo">
                    <h1 class="titulo">MURAL DE EDITAIS</h1>
                    <h7>Acesse os editais disponíveis e faça sua inscrição</h7>
                </div>

                <div class="containerPesquisa">
                    <div class="lupa">
                        <img src="{{ asset('img/lupa.png') }}" alt="Lupa">
                    </div>

                    <div class="busca">
                        <input type="text" id="buscador" placeholder="Buscar Editais...">
                    </div>

                    <div class="filtro">
                        <button class = "filtros">
                            <h7>Filtros ↓</h7>
                        </button>

                        <div class = "opcoes">
                            <button class = "opcao" data-order="recentes">Recentes</button>
                            <button class = "opcao" data-order="antigos">Antigos</button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mural-cards">

                @foreach (array_reverse($editais) as $edital)


                    <div class="edital-card" data-date="{{ $edital->data_fim_inscr }}">

                        <h1 class="edital">{{ $edital->nome }}</h1>

                        <h2 class="tipoEdital">
                            CHAMADA PUBLICA-DOCENTE
                        </h2>

                        <div class="datalimite">

                            <div class="img-calendario">
                                <img src="{{ asset('img/calendario.png') }}" alt="calendario">
                            </div>

                            <div class="edital-data">
                                Data Limite: {{ $edital->data_fim_inscr }}
                            </div>

                        </div>

                        <div class="subcontainer">

                            <p class="descricao">
                                {{ \Illuminate\Support\Str::limit($edital->descricao, 80, '...') }}
                            </p>

                            <div class="edital-botao">

                                <a href="{{ route('login') }}">

                                    <button class="inscricao">

                                        <span class="mais">
                                            <img src="{{ asset('img/mais.png') }}" alt="mais">
                                        </span>

                                        REALIZAR INSCRICAO

                                    </button>

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>
    </div>
@endsection
