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
        
        //Valida o CPF e o usuário
        foreach(Professor::all() as $professor){
            if($request -> cpf === $professor -> cpf){
                return "Erro: professor já cadastrado.";
            }
            
            if($request -> usuario === $professor -> usuario){
                return "Erro: usuário já existe.";
            }
        }
        
        foreach(Aluno::all() as $aluno){
            if($request -> usuario === $aluno -> usuario){
                return "Erro: usuário já existe.";
            }
        }
        
        if($request -> usuario === ('secretaria' || 'moderador')){
            return "Erro: usuário já exite.";
        }
        
        //Cria o novo professor
        Professor::create([
            'nome' => $request -> nome,
            'cpf' => $request -> cpf,
            'endereco' => $request -> endereco,
            'usuario' => $request -> usuario,
            'senha' => Hash::make($request -> senha),
        ]);
        
        //Retorna para a mesma página
        return redirect() -> route('crud-professores');
    }
    
    public function crudProfessores(){
        return view('crud_professores', ['professores' => Professor::all()]);
    }
    
    //Cadastro de Aluno
    public function criaAluno(Request $request){
        
        //Valida o CPF e o usuário
        foreach(Aluno::all() as $aluno){
            if($request -> cpf === $aluno -> cpf){
                return "Aluno já cadastrado.";
            }
            
            if($request -> usuario === $aluno -> usuario){
                return "Erro: usuário já existe.";
            }
        }
        
        foreach(Professor::all() as $professor){
            if ($request -> usuario === $professor -> usuario){
                return "Erro: usuário já existe.";
            }
        }
        
        if($request -> usuario === ('secretaria' || 'moderador')){
            return "Erro: usuário já exite.";
        }
        
        //Cria o aluno
        Aluno::create([
            'nome' => $request -> nome,
            'cpf' => $request -> cpf,
            'endereco' => $request -> endereco,
            'filme' => $request -> filme,
            'usuario' => $request -> usuario,
            'senha' => Hash::make($request -> senha),
        ]);
        
        //Retorna para a mesma página
        return redirect() -> route('crud-alunos');
    }
    
    public function crudAlunos(){
        return view('crud_alunos', ['alunos' => Aluno::all()]);
    }
    
    public function criaCurso(Request $request){
        //Cria o curso
        Curso::create([
            'nome' => $request -> nome,
            'descricao_completa' => $request -> descricao_completa,
            'descricao_simplificada' => $request -> descricao_simplificada,
            'min_alunos' => $request -> min_alunos,
            'max_alunos' => $request -> max_alunos,
            'n_alunos' => 0,
            'status' => 'Matrículas Abertas - Mínimo de alunos não atingido!'
        ]);
        
        //Retorna para a mesma página
        return redirect() -> route('crud-cursos');
    }
    
    public function crudCursos(){
        return view('crud_cursos', ['cursos' => Curso::all()]);
    }
}
