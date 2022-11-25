@extends('layouts.main')

@section('title', 'Raspadinha Cursos - Cadastro - Aluno')

@section ('content')  


<h1>Alunos</h1>

<form action="{{ route('cria-aluno') }}" method="post">
  
  {{ csrf_field() }}
  
  <h3>Cadastrar Aluno</h3>
  
  <div>
    <label for="nome">Nome Completo</label>
    <input type="text" name="nome">
    
    <label for="cpf">CPF</label>
    <input type="text" name="cpf">
    
    <label for="cep">Cep:
        <input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
               onblur="pesquisacep(this.value);" /></label>
    
    <label for="endereco">Endereço</label>
    <input type="text" name="endereco" id="endereco">
    
    <label for="filme">Filme</label>
    <input type="text" name="filme">
    
    <label for="usuario">Usuário</label>
    <input type="text" name="usuario">
    
    <label for="senha">Senha</label>
    <input type="password" name="senha">
    
    <button>Salvar</button>
  </div>
  
</form>

@foreach($alunos as $aluno)

  <h3>- {{ $aluno -> nome }}</h3>

@endforeach  
  
@endsection