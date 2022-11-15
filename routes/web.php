<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ControleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModeradorController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\SecretariaController;
use Illuminate\Support\Facades\Route;

//INCIO
Route::get('/', [ControleController::class, 'inicio']) -> name('pagina-inicio');

//Login
Route::get('/login', [LoginController::class, 'paginaLogin']) -> name('pagina-login');
Route::get('/cadastro', [LoginController::class, 'paginaCadastro']) -> name('pagina-cadastro');
Route::post('/login', [LoginController::class, 'login']) -> name('login');

Route::get('/secretaria', [SecretariaController::class, 'index']) -> name('pagina-secretaria');
Route::get('/moderador', [ModeradorController::class, 'index']) -> name('pagina-moderador');
Route::get('/professor/{professor}', [ProfessorController::class, 'index']) -> name('pagina-professor');
Route::get('/aluno/{aluno}', [AlunoController::class, 'index']) -> name('pagina-aluno');

//Cadastro
Route::post('/cria-aluno', [SecretariaController::class, 'criaAluno']) -> name('cria-aluno');
Route::post('/cria-professor', [SecretariaController::class, 'criaProfessor']) -> name('cria-professor');
Route::post('/cria-secretaria', [SecretariaController::class, 'criaSecretaria']) -> name('cria-secretaria');
Route::post('/cria-curso', [SecretariaController::class, 'criaCurso']) -> name('cria-curso');

Route::get('/altera-dados-botao/{aluno}', [AlunoController::class, 'alteraDadosBotao']) -> name('altera-dados-botao');
Route::post('/altera-dados/{aluno}', [AlunoController::class, 'alteraDados']) -> name('altera-dados');

Route::get('/crud-professores', [SecretariaController::class, 'crudProfessores']) -> name('crud-professores');
Route::get('/crud-alunos', [SecretariaController::class, 'crudAlunos']) -> name('crud-alunos');
Route::get('/crud-cursos', [SecretariaController::class, 'crudCursos']) -> name('crud-cursos');
