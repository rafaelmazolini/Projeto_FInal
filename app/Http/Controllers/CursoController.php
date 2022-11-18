<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index($curso, $alteraAux = 0){
        return view('curso', ['curso' => Curso::find($curso), 'alteraAux' => $alteraAux]);
    }
    
    //Retorna a pagina para a edição do curso
    public function alteraDadosBotao($curso){
        return $this -> index($curso, 1);
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
        
        return $this -> index($curso, 0);
    }   
    
    public function deletaCurso($curso){
        Curso::destroy($curso);
        
        return redirect() -> route('crud-cursos');
    }
    
}