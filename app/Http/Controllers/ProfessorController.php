<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index($professor, $alteraAux = 0){
        return view('professor', ['professor' => Professor::find($professor), 'alteraAux' => $alteraAux, 'cursos' => Curso::all()]);
    }
    
    //Retorna a pagina para a edição do professor
    public function alteraDadosBotao($professor){
        return $this -> index($professor, 1);
    }
    
    //Atualiza os dados do professor e retorna a página dele
    public function alteraDados($professor, Request $request){
        $professorAux = Professor::find($professor);
        
        $professorAux -> nome = $request -> nome;
        $professorAux -> cpf = $request -> cpf;
        $professorAux -> endereco = $request -> endereco;
        $professorAux -> usuario = $request -> usuario;
        
        $professorAux -> save();
        
        return $this -> index($professor, 0);
        
    }
    
    public function deletaProfessor($professor){
        Professor::destroy($professor);
        
        return redirect() -> route('crud-professores');
    }
    
    public function matriculaProfessor($professor, $curso){
        $curso = Curso::find($curso);
        $professor = Professor::find($professor);
        
        $curso -> professor_id = $professor -> id;
        $curso -> save();
        
        return $this -> index($professor -> id, 0);
    }
    
    public function desmatriculaProfessor($professor, $curso){
        $professor = Professor::find($professor);
        $curso = Curso::find($curso);
        
        $curso -> professor_id = NULL;
        $curso -> save();
        
        return $this -> index($professor -> id, 0);
    }
}
