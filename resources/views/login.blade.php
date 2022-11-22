@extends('layouts.main')

@section('title', 'Raspadinha Cursos - Login')

@section ('content')  
  
  <h1>Login</h1>
  
  <form action="{{ route('login') }}" method="post">
    {{ csrf_field() }}
    
    <div>
      <label for="usuario">Usuário</label>
      <input type="text" name="usuario">    
    </br>
      <label for="senha">Senha</label>
      <input type="password" name="senha">
    </div>

    
    <button>Login</button>

    </br>
    
    <div>
      <a href="/">Home</a>
    </div> 
    
@endsection