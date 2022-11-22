<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Http\Request;

class AlunoCursoController extends Controller
{
    public function matriculaAluno($aluno, $curso){
    
        $aluno = Aluno::find($aluno);
        $curso = Curso::find($curso);
        
        if($curso -> n_alunos == $curso -> max_alunos){
            return 'Máximo de alunos já atingido';
        }
        
    
        $aluno->cursos()->attach($curso);
        $curso -> n_alunos += 1;
        $curso -> save();
        
        if($curso -> n_alunos == $curso -> min_alunos){
            $curso -> status = 'Matrículas Abertas - Curso acontecerá!';
            $curso -> save();
        }
        
        if($curso -> n_alunos == $curso -> max_alunos){
            $curso-> status = 'Matrículas Encerradas';
            $curso -> save();
        }
        
        return redirect() -> back();
    }
}
