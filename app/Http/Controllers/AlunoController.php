<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\AlunoCurso;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AlunoController extends Controller
{   
    
    //Recebe o id de um aluno e retorna a sua view com "aluno" como variável na blade
    public function index($aluno, $alteraAux = 0){
        return view('aluno', ['aluno' => Aluno::find($aluno), 'alteraAux' => $alteraAux, 'cursos' => Curso::all()]);
    }
    
    //Retorna a pagina para a edição do aluno
    public function alteraDadosBotao($aluno){
        return $this -> index($aluno, 1);
    }
    
    //Atualiza os dados do aluno e retorna a página dele
    public function alteraDados($aluno, Request $request){
        $alunoAux = Aluno::find($aluno);
        
        $alunoAux -> nome = $request -> nome;
        $alunoAux -> cpf = $request -> cpf;
        $alunoAux -> endereco = $request -> endereco;
        $alunoAux -> filme = $request -> filme;
        $alunoAux -> usuario = $request -> usuario;
        
        $alunoAux -> save();
        
        return $this -> index($aluno, 0);
        
    }
    
    public function deletaAluno($aluno){
    
        $aluno = Aluno::find($aluno);
        
        foreach(AlunoCurso::all() as $alunoCurso){
            if($alunoCurso -> aluno_id == $aluno -> id){
                $curso = Curso::find($alunoCurso -> curso_id);
                $curso -> n_alunos = $curso -> n_alunos - 1;
                $curso -> save();
                AlunoCurso::destroy($alunoCurso -> id);
            }
        }
        
        Aluno::destroy($aluno -> id);
        
        return redirect() -> route('crud-alunos');
    }
    
    public function trocaSenhaBotao($aluno){
        return $this -> index($aluno, 2);
    }
    
    public function trocaSenha($aluno, Request $request){
        $alunoAux = Aluno::find($aluno);
        $alunoAux -> senha = Hash::make($request -> senha);
        $alunoAux -> save();
        
        return $this -> index($aluno, 0);
    }


}
