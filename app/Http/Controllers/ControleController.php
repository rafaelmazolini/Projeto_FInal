<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class ControleController extends Controller
{
    public function inicio(){
        $cursos = Curso::all();
        
        return view('inicio', ['cursos' => $cursos]);
    }
}
