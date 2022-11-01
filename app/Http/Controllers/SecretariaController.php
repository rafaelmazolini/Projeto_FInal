<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use Illuminate\Http\Request;

class SecretariaController extends Controller
{
    public function criaSecretaria(){
        Secretaria::create([
            'usuario' => 'secretaria',
            'senha' => 'senha123'
        ]);
    }
    
    public function index(){
        return view('secretaria');
    }
}
