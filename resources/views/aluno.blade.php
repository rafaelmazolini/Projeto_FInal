@extends('layouts.main')

@section('title', 'Raspadinha Cursos - Aluno')

@section ('content')  

  @if($alteraAux == 0)
  
    <h1>{{ $aluno -> nome }}</h1>
    
    <p>Nome: {{ $aluno -> nome }}</p>
    <p>CPF: {{ $aluno -> cpf }}</p>
    <p>Endereço: {{ $aluno -> endereço }}</p>
    <p>Filme favorito: {{ $aluno -> filme }}</p>
    <h4>Informações de Login</h4>
    <p>Usuário: {{ $aluno -> usuario }}</p>
    
    <form action="{{ route('altera-dados-botao-A', $aluno) }}" method="get">
      <button>Editar Dados</button>
    </form>
    
    <form action="{{ route('deleta-aluno', $aluno) }}" method="post">
      {{ csrf_field() }}
      <button>Excluir aluno</button>
    </form>
    
    <form action="{{ route('troca-senha-A', $aluno) }}" method="post">
      {{ csrf_field() }}
      
      <label for="senha">Nova senha: </label>
      <input type="password" name="senha">
      
      <button>Salvar</button>
      
    </form>
  
  @endif
  
  @if($alteraAux == 1)
  
    <h1>{{ $aluno -> nome }}</h1>
    
    <form action="{{ route('altera-dados-A', $aluno)}} " method="post">
    
      {{ csrf_field() }} 
      
      <label for="nome">Nome Completo: </label>
      <input type="text" name="nome" value="{{ $aluno -> nome }}"> <br>
      
      <label for="cpf">CPF: </label>
      <input type="text" name="cpf" value="{{ $aluno -> cpf }}"> <br>
      
      <label for="endereco">Endereço: </label>
      <input type="text" name="endereco" value="{{ $aluno -> endereco }}"> <br>
      
      <label for="filme">Filme favorito: </label>
      <input type="text" name="filme" value="{{ $aluno -> filme }}"> <br>
      
      <label for="usuario">Usuário: </label>
      <input type="text" name="usuario" value="{{ $aluno -> usuario }}"> <br>
      
      <button>Salvar</button>
    
    </form>
    
    <form action="{{ route('deleta-aluno', $aluno) }}" method="post">
      {{ csrf_field() }}
      <button>Excluir aluno</button>
    </form>
  
  @endif
  
  @if($alteraAux == 2)
  
  <h1>{{ $aluno -> nome }}</h1>
    
    <p>Nome: {{ $aluno -> nome }}</p>
    <p>CPF: {{ $aluno -> cpf }}</p>
    <p>Endereço: {{ $aluno -> endereço }}</p>
    <p>Filme favorito: {{ $aluno -> filme }}</p>
    <h4>Informações de Login</h4>
    <p>Usuário: {{ $aluno -> usuario }}</p>
    
    <form action="{{ route('altera-dados-botao-A', $aluno) }}" method="get">
      <button>Editar Dados</button>
    </form>
    
    <form action="{{ route('deleta-aluno', $aluno) }}" method="post">
      {{ csrf_field() }}
      <button>Excluir aluno</button>
    </form>
    
    <form action="{{ route('troca-senha-A', $aluno) }}" method="post">
      {{ csrf_field() }}
      
      <label for="senha">Nova senha: </label>
      <input type="password" name="senha">
      
      <button>Salvar</button>
      
    </form>
  
  @endif
  
@endsection



