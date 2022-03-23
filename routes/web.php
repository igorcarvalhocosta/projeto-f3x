<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtigosController;
use Illuminate\Support\Facades\Auth;

Route::get('/artigos', [ArtigosController::class, 'index'])
    ->name('listar_artigos');
Route::get('/artigos/criar', [ArtigosController::class, 'create'])
    ->name('form_criar_artigos')
    ->middleware('auth');
Route::post('/artigos/criar', [ArtigosController::class, 'store'])
    ->middleware('auth')   ;
Route::delete('/artigos/{id}', [ArtigosController::class, 'destroy'])
    ->middleware('auth');
Route::post('/artigos/{id}/editaArtigo', [ArtigosController::class, 'editaArtigo'])
    ->middleware('auth');

Auth::routes();
Route::get('/home', function(){
    return redirect('/artigos');
})->name('home');

Route::get('/sair', function () {
    Auth::logout();
    return redirect('/login');
});

Route::get('/', function(){
    return redirect('/login');
});
