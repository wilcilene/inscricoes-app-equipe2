@extends("obs:trocar pelo certo")
@section("obs:trocar pelo certo")
<div class = "main-container">
    <div class = "wrap">
        <div class = "a">
            <div class = "titulo-subtitulo">
                <h1 class = "titulo">MURAL DE EDITAIS</h1>
                <h2>Acesse os editais disponíveis e faça sua inscrição</h2>
            </div>
            <div class = "containerPesquisa">
                <div class = "lupa">
                    <img src="{{ asset('img/lupa.png') }}" alt="Lupa">
                </div>
                <div class = "busca">
                    <input type="text" id = "buscador" placeholder="Buscar Editais...">
                </div>
                <div class = "filtro">
                    <h4>Filtros ↓</h4>
                </div>
            </div>

        </div>
        <div class = "cards">
        @foreach (array_reverse($editais) as $edital)
                <div class = "card">
                        <h1 class = "edital">{{ $edital->nome}}</h1>
                        <h2 class = "tipoEdital">CHAMADA PUBLICA-DOCENTE</h2>
                        <div class = "datalimite">
                            <div class = "img-calendario">
                                <img src="{{ asset('img/calendario.png') }}" alt="calendario">
                            </div>
                            <div class = "data">Data Limite:{{$edital->data_fim_inscr}}</div>
                        </div>
                        <div class = "subcontainer">
                            <p class = "descricao">{{ $edital->descricao}}</p>
                            <div class = "botao">
                                <a href="{{ route('dashboard') }}">
                                       <button class="inscricao">
                                           <div class = "mais">
                                               <img src="{{ asset('img/mais.png') }}" alt="simbolo do sinal mais">
                                           </div>
                                           REALIZAR INSCRICAO</button>
                                   </a>
                            </div>
                        </div>
                </div>
        @endforeach
        </div>
    </div>
</div>
@endsection
