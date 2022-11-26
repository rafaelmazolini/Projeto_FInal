@extends('layouts.main')

@section('title', 'Raspadinha Cursos - Professores')

@section ('content')  

  <form action="{{ route('pagina-inicio') }}" method="get">
    <button>Menu</button>
  </form>
  
  <h1>Professores</h1>
  
   
  <form action="{{ route('cria-professor') }}" method="post">
    
    {{ csrf_field()}}
  
    <h3>Cadastrar Professor:</h3>
    
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
      
      <label for="usuario">Usuário</label>
      <input type="text" name="usuario">
      
      <label for="senha">Senha</label>
      <input type="password" name="senha">
      
      <button>Salvar</button>
    </div>
    
  </form>
  
  @foreach($professores as $professor)
  
    <form action="{{ route('pagina-professor', $professor) }}" method="get">
    
      <button>{{$professor -> nome}}</button>
      
    </form>
    
  @endforeach
  
@endsection
