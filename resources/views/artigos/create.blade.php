@extends('layout')

@section('cabecalho')
Adicionar Artigos
@endsection

@section('conteudo')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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

label {
    font-size: 18px;
}
</style>

<form method="post">
@csrf
  <div class="form-outline mb-4">
    <label class="form-label" for="titulo">Titulo</label>
    <input name="titulo" type="text" id="titulo" class="form-control" />
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="texto">Texto</label>
    <textarea name="texto" class="form-control" id="texto" rows="4"></textarea>
  </div>

  <button type="submit" class="btn login-btn mb-4">Adicionar</button>
</form>
@endsection('cabecalho')
    