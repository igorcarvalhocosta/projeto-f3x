# Projeto F3X

Desenvolvimento de uma aplicação web que é capaz de executar as funções de criar, visualizar, editar e deletar artigos com textos e títulos.

## Recursos Utilizados no Desenvolvimento da Aplicação:

- Laravel Framework ~ 9.5.1;
- PHP ~ 8.1.2;
- Composer;
- MySQL;
- CSS;
- HTML; 
- Javascript;


## Executando a Aplicação:
Para que o projeto execute de maneira satisfatória, há a necessidade de instalar os programas abaixo:

1) Instalar: XAMPP [AQUI](https://www.apachefriends.org/pt_br/download.html)
  - Video explicando como instalar o XAMPP [AQUI](https://www.youtube.com/watch?v=QZl84w2cd_c)

2) Instalar Composer [AQUI](https://getcomposer.org/)

 - Documentação do composer explica como instalar.

3) Instalar Laravel Framework [AQUI](https://laravel.com/docs/9.x/installation)

 - Documentação do Laravel explica como instalar.

4) Para fazer a conexão com o banco de dados MySQL:

Deverá criar o arquivo .env na raiz do projeto, com o conteúdo igual ao que o arquivo .env.example nos oferece, modificando apenas o seguinte campo colocando o nome do banco de dados:

```
DB_DATABASE=nome-bando-de-dados
```

5) Para criar as tabelas e campos da forma correta no seu banco de dados deverá rodar o seguinte comando:
```
> php artisan migrate
```

6) Depois que tudo foi instalado vamos buildar e subir a nossa aplicação:

Deverá abrir o seu terminal e digitar o seguinte comando abaixo:
```
> php artisan serve 
```
