<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SecretariaController;
use App\Models\Secretaria;
use Illuminate\Support\Facades\Route;

//INCIO
Route::get('/', function () {
    return view('inicio');
});

//Login
Route::get('login', [LoginController::class, 'paginaLogin']) -> name('pagina-login');
Route::get('cadastro', [LoginController::class, 'paginaCadastro']) -> name('pagina-cadastro');
Route::post('cria-secretaria', [SecretariaController::class, 'criaSecretaria']) -> name('cria-secretaria');
Route::post('login', [LoginController::class, 'login']) -> name('login');

Route::get('secretaria', [SecretariaController::class, 'index']) -> name('pagina-secretaria');