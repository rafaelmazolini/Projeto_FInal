<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index($aluno){
        return view('aluno', ['aluno' => Aluno::find($aluno)]);
    }
}
