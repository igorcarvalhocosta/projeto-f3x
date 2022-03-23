<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ArtigosFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Artigo;


class ArtigosController {

    public function index(Request $request)
    {
        $artigos = Artigo :: query()
            ->orderBy('titulo')
            ->get();
        $mensagem = $request->session()->get('mensagem');

        return view('artigos.index', [
            'artigos' => $artigos,
            'mensagem' => $mensagem
        ]);
    }

    public function create()
    {
        return view('artigos.create');
    }

    public function store(ArtigosFormRequest $request)
    {
        $artigo = Artigo::create(['titulo'=>$request->titulo, 'texto'=>$request->texto]);

        $request->session()
            ->flash(
                'mensagem',
                "Artigo criada com sucesso: {$artigo->titulo}."
            );

        return redirect()->route('listar_artigos');
    }

    public function destroy(Request $request)
    {
        Artigo::destroy($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Artigo removido com sucesso."
            );
        
        return redirect()->route('listar_artigos');
    }

    public function editaArtigo(int $id, Request $request)
    {
        $artigo = Artigo::find($id);
        $artigo->titulo = $request->titulo;
        $artigo->texto = $request->texto;
        $artigo->save();
    }

}