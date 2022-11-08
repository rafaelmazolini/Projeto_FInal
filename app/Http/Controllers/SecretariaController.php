<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Professor;
use App\Models\Secretaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SecretariaController extends Controller
{   
    //Página da Secretaria
    public function index(){
        return view('secretaria');
    }
    
    //Cadastro de professor
    public function criaProfessor(Request $request){
        Professor::create([
            'nome' => $request -> nome,
            'cpf' => $request -> cpf,
            'endereco' => $request -> endereco,
            'usuario' => Hash::make($request -> usuario),
            'senha' => Hash::make($request -> senha),
        ]);
        
        return redirect() -> route('crud-professores');
    }
    
    public function crudProfessores(){
        return view('crud_professores', ['professores' => Professor::all()]);
    }
    
    //Cadastro de Aluno
    public function criaAluno(Request $request){
        Aluno::create([
            'nome' => $request -> nome,
            'cpf' => $request -> cpf,
            'endereco' => $request -> endereco,
            'filme' => $request -> filme,
            'usuario' => Hash::make($request -> usuario),
            'senha' => Hash::make($request -> senha),
        ]);
        
        return redirect() -> route('crud-alunos');
    }
    
    public function crudAlunos(){
        return view('crud_alunos', ['alunos' => Aluno::all()]);
    }
    
    public function criaCurso(Request $request){
        Curso::create([
            'nome' => $request -> nome,
            'descricao_completa' => $request -> descricao_completa,
            'descricao_simplificada' => $request -> descricao_simplificada,
            'min_alunos' => $request -> min_alunos,
            'max_alunos' => $request -> max_alunos,
            'status' => 'Matrículas Abertas - Mínimo de alunos não atingido!'
        ]);
        
        return redirect() -> route('crud-cursos');
    }
    
    public function crudCursos(){
        return view('crud_cursos');
    }
}
