@extends('layouts.main')

@section('title', 'Raspadinha Cursos - Alunos')

@section ('content')  

<h1>Alunos</h1>

<form action="{{ route('cria-aluno') }}" method="post">
  
    {{ csrf_field() }}
    
    <h3>Cadastrar Aluno</h3>
    
      <div id="login-container" class="col-md-2 offset-md-5">
  
        <div class="form group">
          <label for="nome">Nome:</label>
          <input type="text"  class="form-control" name="nome" placeholder="Nome... ">
        </div>
  
        <div class="form group">
          <label for="cpf">CPF:</label>
          <input type="text" class="form-control" name="cpf" placeholder="CPF...">
        </div>
  
        <div class="form group">
          <label for="cep">Cep:
            <input name="cep" class="form-control" type="text" id="cep" value="" size="30" maxlength="9" placeholder="Cep..."
                   onblur="pesquisacep(this.value);" /></label>
        </div>
        
        <div class="form group">
          <label for="endereco">Endereço:</label>
          <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço...">
        </div>
  
        <div class="form group">
          <label for="filme">Filme:</label>
          <input type="text" class="form-control" name="filme" placeholder="Filme...">
        </div>
  
        <div class="form group">
          <label for="usuario">Usuário:</label>
          <input type="text" class="form-control" name="usuario" placeholder="Usuário...">
        </div>
  
        <div class="form group">
          <label for="senha">Senha:</label>
          <input type="password" class="form-control" name="senha" placeholder="Senha...">
        </div>
  
      </br>
      <button class="btn btn-secondary">Salvar</button>
      </form>
    </div>

</br>

  @foreach($alunos as $aluno)
    <form action="{{ route('pagina-aluno', $aluno) }}" method="get">

      <div class="btn-group dropup">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Alunos-Cadastro
        </button>
        <div class="dropdown-menu">
        <h6 class="dropdown-header">Alunos</h6>
        <a href="{{ route('pagina-aluno', $aluno) }}">{{$aluno -> nome}}</a>
        </div>
      </div>

    </form> 
  @endforeach
@endsection