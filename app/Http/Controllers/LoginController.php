<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Moderador;
use App\Models\Professor;
use App\Models\Secretaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{   
    //Ao primeiro acesso à página de login, cria o usuário da secretaria e do moderador
    public function paginaLogin(){
    
        //Secretaria
        if(count(Secretaria::all()) < 1){
            Secretaria::create([           
                'usuario' => Hash::make('secretaria'), //criptografa o usuario
                'senha' => Hash::make('senha123') //criptografa a senha
            ]);
        }
        
        //Moderador
        if(count(Moderador::all()) < 1){
            Moderador::create([           
                'usuario' => Hash::make('moderador'), //criptografa o usuario
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
        if(Hash::check($request -> usuario, $secretaria -> usuario) & Hash::check($request -> senha, $secretaria -> senha)){
            return redirect() -> route('pagina-secretaria');    
        }
        
        //Moderador (Descritografa a senha e o usuario)
        if(Hash::check($request -> usuario, $moderador -> usuario) & Hash::check($request -> senha, $moderador -> senha)){
            return redirect() -> route('pagina-moderador');    
        }
        
        //Professor (Descriptografa a senha e o usuário)
        foreach($professores as $professor){
            if(Hash::check($request -> usuario, $professor -> usuario) & Hash::check($request -> senha, $professor-> senha)){
                return redirect() -> route('pagina-professor');    
            }
        }
        
        //Aluno (Descriptografa a senha e o usuário)
        foreach($alunos as $aluno){
            if(Hash::check($request -> usuario, $aluno -> usuario) & Hash::check($request -> senha, $aluno-> senha)){
                return redirect() -> route('pagina-aluno');    
            }
        }
        
        return 'Nenhum usuário encontrado';
    }   
}
