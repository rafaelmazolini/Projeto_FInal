<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Moderador;
use App\Models\Professor;
use App\Models\Secretaria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{   
    //Ao primeiro acesso à página de login, cria o usuário da secretaria e do moderador
    public function paginaLogin(){
    
        //Secretaria
        if(count(Secretaria::all()) < 1){
            Secretaria::create([           
                'usuario' => 'secretaria',
                'senha' => Hash::make('senha123') //criptografa a senha
            ]);
        }
        
        //Moderador
        if(count(Moderador::all()) < 1){
            Moderador::create([           
                'usuario' => 'moderador',
                'senha' => Hash::make('senha321') //criptografa a senha
            ]);
        }
        
        return view('login'); //Retorna a view de login
    }
     
    public function paginaCadastro(){
        return view('cadastro');
    }
    
    //Verifica Login
    public function login(Request $request){
        $secretaria = Secretaria::find(1);
        $moderador = Moderador::find(1);
        $professores = Professor::all();
        $alunos = Aluno::all();
        
        //Secretaria (Descritografa a senha e o usuario)
        if($request -> usuario == $secretaria -> usuario & Hash::check($request -> senha, $secretaria -> senha)){
            return redirect() -> route('pagina-secretaria');    
        }
        
        //Moderador (Descritografa a senha e o usuario)
        if($request -> usuario == $moderador -> usuario & Hash::check($request -> senha, $moderador -> senha)){
            return redirect() -> route('pagina-moderador');    
        }
        
        //Professor (Descriptografa a senha e o usuário)
        foreach($professores as $professor){
            if($request -> usuario == $professor -> usuario & (Hash::check(  $request -> senha, $professor-> senha) || Hash::check($request -> senha, $secretaria -> senha))){
                
                $professor = Professor::find($professor -> id);
                $professor -> ultimo_acesso = Carbon::now();
                $professor -> save();
                
                return redirect() -> route('pagina-professor', $professor);    
            }
        }
        
        //Aluno (Descriptografa a senha e o usuário)
        foreach($alunos as $aluno){
            if($request -> usuario == $aluno -> usuario & (Hash::check($request -> senha, $aluno-> senha) || Hash::check($request -> senha, $secretaria -> senha))){
                
                $alunoAux = Aluno::find($aluno -> id);
                $alunoAux -> ultimo_acesso = Carbon::now();
                $alunoAux -> save();
                
                return redirect() -> route('pagina-aluno', $aluno);    
            }
        }
        
        return 'Nenhum usuário encontrado';
    }   
}
