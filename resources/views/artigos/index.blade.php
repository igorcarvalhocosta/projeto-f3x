@extends('layout')

@section('cabecalho')
Artigos
@endsection

@section('conteudo')

<style>
.login-btn {
    padding: 13px 30px;
    background-color: #000;
    border-radius: 0;
    font-size: 20px;
    font-weight: bold;
    color: #fff
}

.login-btn:hover {
    border: 1px solid #000;
    background-color: transparent;
    color: #000
}
</style>

@if(!empty($mensagem))
    <div class="alert alert-success">
        {{ $mensagem }}
    </div>
@endif
    @auth
    <a href="{{ route('form_criar_artigos') }}" class="btn login-btn mb-5 mt-5">Criar Novo Artigo</a>
    @endauth

    <ul class="list-group">
        @foreach($artigos as $artigo)
            <li class="list-group-item d-flex justify-content-between align-items-center mb-4">

                <div style="width: 80%;">
                    <h4 id="titulo-artigo-{{ $artigo->id }}" >{{ $artigo->titulo }}</h4>
                    <p style="width: 100%; word-wrap: break-word;"  id="texto-artigo-{{ $artigo->id }}">{{ $artigo->texto }}</p>

                    <div hidden id="edit-{{ $artigo->id }}">
                        <label for="input-titulo-artigo-{{ $artigo->id }}">Titulo:</label>
                        <input type="text" id="input-titulo-artigo-{{ $artigo->id }}" class="form-control mb-3" value="{{ $artigo->titulo }}">

                        <label for="input-texto-artigo-{{ $artigo->id }}">Texto:</label>
                        <textarea type="text"  id="input-texto-artigo-{{ $artigo->id }}" class="form-control mb-3">{{ $artigo->texto }}</textarea>

                        <div class="input-group-append">
                            <button class="btn login-btn" style="padding: 7px 15px" onclick="editarArtigo({{ $artigo->id }})">
                                <i class="fas fa-check"></i>
                            </button>
                            @csrf
                        </div>
                    </div>
                </div>

                

                <span class="d-flex">
                    @auth
                    <button class="btn btn-info btn-sm mr-3" style="margin-right: 10px;" onclick="toggleInput({{$artigo->id }})">
                        <i class="fas fa-edit"></i>
                    </button>

                    <form method="post" action="/artigos/{{ $artigo->id }}" onsubmit="return confirm('Tem certeza que deseja remover o artigo {{ $artigo->titulo }}?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                    @endauth
                </span>
            </li>
            
        @endforeach
    </ul>

<script>
    function toggleInput(artigoId) {
        const nomeSerieEl = document.getElementById(`titulo-artigo-${artigoId}`);
        const inputSerieEl = document.getElementById(`edit-${artigoId}`);
        
        const texto = document.getElementById(`texto-artigo-${artigoId}`);

        if (nomeSerieEl.hasAttribute('hidden')) {
            nomeSerieEl.removeAttribute('hidden');
            texto.removeAttribute('hidden');
            inputSerieEl.hidden = true;
    
        } else {
            inputSerieEl.removeAttribute('hidden');
            nomeSerieEl.hidden = true;
            texto.hidden = true;
        }
    }

    function editarArtigo(artigoId) {
        let formData = new FormData();

        const titulo = document
            .querySelector(`#input-titulo-artigo-${artigoId}`)
            .value;
        const texto = document.querySelector(`#input-texto-artigo-${artigoId}`)
            .value;
        console.log(texto);
        const token = document
            .querySelector(`input[name="_token"]`)
            .value;
        formData.append('titulo', titulo);
        formData.append('texto', texto);
        formData.append('_token', token);
        const url = `/artigos/${artigoId}/editaArtigo`;
        fetch(url, {
            method: 'POST',
            body: formData
        }).then(() => {
            toggleInput(artigoId);
            document.getElementById(`titulo-artigo-${artigoId}`).textContent = titulo;
            document.getElementById(`texto-artigo-${artigoId}`).textContent = texto;
        });
    }
</script>
@endsection
