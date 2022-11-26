@extends('layouts.main')

@section('title', 'Raspadinha Cursos - Login')

@section ('content')  
  
<div id="login-container" class="col-md-2 offset-md-5">
    <h1>Login</h1>
    <form action="{{ route('login') }}" method="post">
    {{ csrf_field() }}
    <div class="form group">
      <label for="usuario">Usuario:</label>
      <input type="text"  class="form-control" name="usuario" placeholder="Usuario... ">
    </div>
    <div class="form group">
      <label for="senha">Senha:</label>
      <input type="password" class="form-control" name="senha" placeholder="Senha...">
    </div>
    </br>
    <button class="btn btn-secondary">Salvar</button>
    </form>
  </div>

@endsection

