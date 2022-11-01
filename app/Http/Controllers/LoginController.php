<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use Illuminate\Http\Request;

class LoginController extends Controller
{   
    //Ao primeiro acesso à página de login, cria o usuário da secretaria
    public function paginaLogin(){
        if(count(Secretaria::all()) < 1){
            Secretaria::create([           
                'usuario' => 'secretaria',
                'senha' => 'senha123'
            ]);
        }
        
        
        //ADICIONAR USUARIO ADMIN
        
        return view('login');
    }
     
    public function paginaCadastro(){
        return view('cadastro');
    }
    
    //Verifica Login
    public function login(Request $request){
        $secretaria = Secretaria::find(1);
        
        //Secretaria
        if($request -> usuario == $secretaria -> usuario & $request -> senha == $secretaria -> senha){
            return redirect() -> route('pagina-secretaria');
        }
    }   
}
