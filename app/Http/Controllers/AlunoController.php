<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{   
    
    //Recebe o id de um aluno e retorna a sua view com "aluno" como variável na blade
    public function index($aluno, $alteraAux = 0){
        return view('aluno', ['aluno' => Aluno::find($aluno), 'alteraAux' => $alteraAux]);
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

}
