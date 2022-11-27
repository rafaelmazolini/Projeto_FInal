@extends('layouts.main')

@section('title', 'Raspadinha Cursos - Professores')

@section ('content')  
  
  <h2 class="titulo">Professores</h2>

    @foreach($professores as $professor)
    
      <form action="{{ route('pagina-professor', $professor) }}" method="get">
      
        <button class="btn-prof-crud">{{$professor -> nome}}</button>
        
      </form>
      
    @endforeach
   
  <form action="{{ route('cria-professor') }}" method="post">
    
    {{ csrf_field()}}
  
    <h4 class="cadastrar-professor">Cadastrar Professor:</h4>
    
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

      <br>
      <h1></h1>

      <label for="usuario">Usuário</label>
      <input type="text" name="usuario">
      
      <label for="senha">Senha</label>
      <input type="password" name="senha">
      <br>
      <button class="btn" id="botao-salvar">Salvar</button>
    </div>
    
  </form>
  
  
  
@endsection
