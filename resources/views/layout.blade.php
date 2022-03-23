<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <title>Controle de Artigos</title>
</head>
<body>
    @auth
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm d-flex justify-content-between">
        <div class="container">
            <a class="navbar-brand" href="{{ route('listar_artigos') }}">Home</a>
            @auth
            <a href="/sair" class="navbar-brand text-danger">Sair</a>
            @endauth

            @guest
            <a href="/login" class="navbar-brand text-primary">Entrar</a>
            @endguest
        </div>
    </nav>
    @endauth
    <div class="container">
        <div class="jumbotron mb-1 mt-3">
            <h1 class="display-4">@yield('cabecalho')</h1>
        </div>
        @yield('conteudo')
    </div>
</body>
</html>