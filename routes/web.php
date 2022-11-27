<?php
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AlunoCursoController;
use App\Http\Controllers\ControleController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModeradorController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\SecretariaController;
use App\Models\Aluno;
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
Route::get('/pagina-curso/curso={curso}/usuario={usuario}/aluno={aluno}', [CursoController::class, 'index']) -> name('pagina-curso');

//Cadastro
Route::post('/cria-aluno', [SecretariaController::class, 'criaAluno']) -> name('cria-aluno');
Route::post('/cria-professor', [SecretariaController::class, 'criaProfessor']) -> name('cria-professor');
Route::post('/cria-secretaria', [SecretariaController::class, 'criaSecretaria']) -> name('cria-secretaria');
Route::post('/cria-curso', [SecretariaController::class, 'criaCurso']) -> name('cria-curso');

//Edição de Cadastro
Route::get('/altera-dados-botao-A/{aluno}', [AlunoController::class, 'alteraDadosBotao']) -> name('altera-dados-botao-A');
Route::post('/altera-dados-A/{aluno}', [AlunoController::class, 'alteraDados']) -> name('altera-dados-A');
Route::get('/troca-senha-botao-A/{aluno}', [AlunoController::class, 'trocaSenhaBotao']) -> name('troca-senha-botao-A');
Route::post('/troca-senha-A/{aluno}', [AlunoController::class, 'trocaSenha']) -> name('troca-senha-A');
Route::get('/altera-dados-botao-P/{professor}', [ProfessorController::class, 'alteraDadosBotao']) -> name('altera-dados-botao-P');
Route::post('/altera-dados-P/{professor}', [ProfessorController::class, 'alteraDados']) -> name('altera-dados-P');
Route::get('/altera-dados-botao-C/{curso}', [CursoController::class, 'alteraDadosBotao']) -> name('altera-dados-botao-C');
Route::post('/altera-dados-C/{curso}', [CursoController::class, 'alteraDados']) -> name('altera-dados-C');

//Exclusão de Cadastro
Route::post('/deleta-aluno/{aluno}', [AlunoController::class, 'deletaAluno']) -> name('deleta-aluno');
Route::post('/deleta-professor/{professor}', [ProfessorController::class, 'deletaProfessor']) -> name('deleta-professor');
Route::post('/deleta-curso/{curso}', [CursoController::class, 'deletaCurso']) -> name('deleta-curso');

Route::get('/crud-professores', [SecretariaController::class, 'crudProfessores']) -> name('crud-professores');
Route::get('/crud-alunos', [SecretariaController::class, 'crudAlunos']) -> name('crud-alunos');
Route::get('/crud-cursos', [SecretariaController::class, 'crudCursos']) -> name('crud-cursos');


Route::get('/matricula-aluno/{aluno}{curso}', [AlunoCursoController::class, 'matriculaAluno']) -> name('matricula-aluno');
Route::get('/desmatricula-aluno/{aluno}/{curso}', [AlunoCursoController::class, 'desmatriculaAluno']) -> name('desmatricula-aluno');
Route::get('/matricula-professor/{professor}/{curso}', [ProfessorController::class, 'matriculaProfessor']) -> name('matricula-professor');
Route::get('/desmatricula-professor/{professor}/{curso}', [ProfessorController::class, 'desmatriculaProfessor']) -> name('desmatricula-professor');
Route::post('/atribui-nota/{aluno}/{curso}',[AlunoCursoController::class, 'atribuiNota']) -> name('atribui-nota');
