@extends('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')

@if(!empty($mensagem))
    <div class="alert alert-success">
        {{ $mensagem }}
    </div>
@endif
    @auth
    <a href="{{ route('form_criar_artigos') }}" class="btn btn-dark mb-2">Adicionar</a>
    @endauth

    <ul class="list-group">
        @foreach($series as $serie)

                <div class="card" style="width: 18rem;">
                <img src="https://tm.ibxk.com.br/2015/08/26/26130218830276.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <span id="nome-serie-{{ $serie->id }}"><h5>{{ $serie->nome }}</h5></span>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Saiba mais</a>
                </div>
                </div>

                <span class="d-flex">
                    @auth
                    <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $serie->id }})">
                        <i class="fas fa-edit"></i>
                    </button>
                    @endauth
                    @auth
                    <form method="post" action="/artigos/{{ $serie->id }}" onsubmit="return confirm('Tem certeza que deseja remover a série {{ $serie->nome }}?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                    @endauth
                </span>
                
            
        @endforeach
    </ul>
    <script>

        function toggleInput(serieId) {
            const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
            const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
            if (nomeSerieEl.hasAttribute('hidden')) {
                nomeSerieEl.removeAttribute('hidden');
                inputSerieEl.hidden = true;
            } 
            else {
                inputSerieEl.removeAttribute('hidden');
                nomeSerieEl.hidden = true;
            }
        }

        function editarSerie(serieId) {
            let formData = new FormData();
            const nome = document
                .querySelector(`#input-nome-serie-${serieId} > input`)
                .value;
            const token = document
                .querySelector(`input[name="_token"]`)
                .value;
            formData.append('nome', nome);
            formData.append('_token', token);
            const url = `/artigos/${serieId}/editaNome`;
            fetch(url, {
                method: 'POST',
                body: formData
            }).then(() => {
                toggleInput(serieId);
                document.getElementById(`nome-serie-${serieId}`).textContent = nome;
            });
        } 

    </script> 
@endsection
