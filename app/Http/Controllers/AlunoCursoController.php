<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Http\Request;

class AlunoCursoController extends Controller
{
    public function store(Request $request){
        $aluno = $request -> aluno;
        $curso = $request -> materia;
        
        $aluno = Aluno::find($aluno);
        $curso = Curso::find($curso);
    
        $aluno->materias()->attach($curso);
        
        return redirect() -> back();
    }
}
