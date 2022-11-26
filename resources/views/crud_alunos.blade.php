@extends('layouts.main')

@section('title', 'Raspadinha Cursos - Alunos')

@section ('content')  

  <h2 class="titulo">Alunos</h2>

    @foreach($alunos as $aluno)

      <form action="{{ route('pagina-aluno', $aluno) }}" method="get">
        
        <button class="btn-aluno-crud">{{$aluno -> nome}}</button>

      </form>  

    @endforeach 

  <form action="{{ route('cria-aluno') }}" method="post">
  
    {{ csrf_field() }}
    
    <h4 class="cadastrar-aluno">Cadastrar Aluno</h4>
    
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
      <input type="text" name="filme" id="filme">

      <br>
      <h1></h1>

      <label for="usuario">Usuário</label>
      <input type="text" name="usuario">
      
      <label for="senha">Senha</label>
      <input type="password" name="senha">
      <br>
      <button class="btn" id="botao-salvar">Salvar</button>
    </div>
  </br>

@endsection