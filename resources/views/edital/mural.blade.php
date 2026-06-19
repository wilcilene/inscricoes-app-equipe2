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

                @foreach ($editais as $edital)


                    <div class="edital-card {{ $edital->data_fim_inscr < $hoje ? 'expirado' : '' }}"
                         data-date="{{ $edital->data_fim_inscr }}">

                        <h1 class="edital">{{ $edital->nome }}</h1>

                        <h2 class="tipoEdital">
                            CHAMADA PUBLICA-DOCENTE
                        </h2>

                        <div class="datalimite">

                            <div class="img-calendario">
                                <img src="{{ asset('img/calendario.png') }}" alt="calendario">
                            </div>

                            <div class="edital-data">
                                Data Limite:{{ \Carbon\Carbon::parse($edital->data_fim_inscr)->format('d/m/Y') }}
                            </div>

                        </div>

                        <div class="subcontainer">

                            <p class="descricao">
                                {{ \Illuminate\Support\Str::limit($edital->descricao, 80, '...') }}
                            </p>
                            @if($ehAdmin)
                                <div class="edital-botao-adm">
                                     <a href="{{ route('edital.formulario') }}">
                                        
                                        <button class="inscricao" type="button">
                                            
                                            <span class="mais">
                                                <img src="{{ asset('img/editar.png') }}" alt="editar">
                                            </span>
                                            
                                            Editar
                                        </button>
                                     </a>

                                    <form action="{{ route('edital.remover', $edital->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="inscricao" type="submit">
                                            <span class="mais">
                                                <img src="{{ asset('img/x.png') }}" alt="remover">
                                            </span>
                                            Remover
                                        </button>
                                    </form>

                                </div>
                                @else
                                    @if($edital->data_fim_inscr >= $hoje)
                                    <div class = "edital-botao">
                                        <a href="{{ route('login') }}">

                                            <button class="inscricao">

                                                <span class="mais">
                                                    <img src="{{ asset('img/mais.png') }}" alt="mais">
                                                </span>

                                                REALIZAR INSCRICAO

                                            </button>

                                        </a>
                                    </div>
                                    @endif
                                @endif

                        </div>

                    </div>

                @endforeach

            </div>

        </div>
    </div>
@endsection
