<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Serie;
use App\Episodio;
use App\Temporada;

class ArtigosController {

    public function index(Request $request)
    {
        $series = Serie :: query()
            ->orderBy('nome')
            ->get();
        $mensagem = $request->session()->get('mensagem');

        return view('artigos.index', [
            'series' => $series,
            'mensagem' => $mensagem
        ]);
    }

    public function create()
    {
        return view('artigos.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create(['nome'=>$request->nome]);

        $request->session()
            ->flash(
                'mensagem',
                "Série {$serie->id} criada com sucesso: {$serie->nome}."
            );

        return redirect()->route('listar_artigos');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Série removida com sucesso."
            );
        
        return redirect()->route('listar_artigos');
    }

    public function editaNome(int $id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }

}