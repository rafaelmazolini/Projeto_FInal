<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\AlunoCurso;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{

    public function index($curso, $usuario, $aluno = 1, $alteraAux = 0){
        $mediaGeral = $this -> calculaMedia($curso);
        $aprovados = $this -> nAprovados($curso);
    
        return view('curso', ['curso' => Curso::find($curso), 'usuario' => $usuario, 'alteraAux' => $alteraAux, 'alunoCurso' => AlunoCurso::all(), 'aluno' => Aluno::find($aluno), 'mediaGeral' => $mediaGeral, 'aprovados' => $aprovados]);
    }
    
    //Retorna a pagina para a edição do curso
    public function alteraDadosBotao($curso){
        return $this -> index($curso, 'secretaria', 0,  1);
    }
    
    //Atualiza os dados do curso e retorna a página dele
    public function alteraDados($curso, Request $request){
        $cursoAux = curso::find($curso);
        
        $cursoAux -> nome = $request -> nome;
        $cursoAux -> descricao_completa = $request -> descricao_completa;
        $cursoAux -> descricao_simplificada = $request -> descricao_simplificada;
        $cursoAux -> min_alunos = $request -> min_alunos;
        $cursoAux -> max_alunos = $request -> max_alunos;
        
        $cursoAux -> save();
        
        return $this -> index($curso, 'secretaria', 1, 0);
    }   
    
    public function deletaCurso($curso){
        $curso = Curso::find($curso);
        
        foreach(AlunoCurso::all() as $alunoCurso){
            if($alunoCurso -> curso_id == $curso -> id){
                AlunoCurso::destroy($alunoCurso -> id);
            }
        }
        Curso::destroy($curso -> id);
        
        return redirect() -> route('crud-cursos');
    }
    
    public function calculaMedia($curso){
        $curso = Curso::find($curso);
        $mediaGeral = 0;
        $alunos = AlunoCurso::where('curso_id', $curso -> id) -> get();
        
        if($curso -> n_alunos > 0){
            foreach($alunos as $aluno){
                $nota = $aluno -> nota;
                $mediaGeral += $nota;
            }
            $mediaGeral = $mediaGeral / $curso -> n_alunos;
            
            return $mediaGeral;
        }
        
        return 'Indefinido.';
    }
    
    public function nAprovados($curso){
        $curso = Curso::find($curso);
        $aprovados = count(AlunoCurso::where('curso_id', $curso -> id) -> where('nota', '>=', 5) -> get());
        if($curso -> n_alunos == 0){
            $porcentagem = 0;
        }
        
        else{
            $porcentagem = $aprovados / $curso -> n_alunos * 100;
        }
        
        
        return [$aprovados, $porcentagem];
    }
    
}