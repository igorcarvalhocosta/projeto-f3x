@extends('layout')

@section('cabecalho')
Adicionar Séries
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

<form method="post">
    @csrf
    <div class="row">
        <div class="col col-8">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>
    </div>
    <button class="btn btn-primary mt-2">Adicionar</button>
</form>

@endsection('cabecalho')
    