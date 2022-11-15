<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index($professor){
        return view('professor', ['professor' => Professor::find($professor)]);
    }
}
