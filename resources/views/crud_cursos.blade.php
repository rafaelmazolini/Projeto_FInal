@extends('layouts.main')

@section('title', 'Raspadinha Cursos - Cursos')

@section ('content')  

<h2>Cursos Disponíveis</h2>

  @foreach($cursos as $curso)

    <form action="{{ route('pagina-curso', [$curso, 'secretaria', 'aluno' => 1]) }}" method="get">
    {{ csrf_field() }}

      <button class="btn-curso-crud">{{$curso -> nome}}</button>

    </form> 

  @endforeach

  <br> 
  
  <form action="{{ route('cria-curso') }}" method="post">
  
  {{ csrf_field() }}
  
  <h2 class="titulo">Criar Curso</h2>
  
  <div>
    <label for="nome">Nome</label>
    <input type="text" name="nome">    
    
    <label for="min_alunos">Mínimo de alunos</label>
    <input type="text" name="min_alunos" size="5" maxlength="4">
    
    <label for="max_alunos">Máximo de alunos</label>
    <input type="text" name="max_alunos" size="5" maxlength="4">
    
    <br>
    
    <label for="descricao_completa">Descrição Completa</label>
    <input type="text" name="descricao_completa">
    
    <label for="descricao_simplifica">Descrição Simplificada</label>
    <input type="text" name="descricao_simplificada">

    <br>
    
    <button class="btn" id="botao-salvar">Salvar</button>
  </div>
  
</form>

@endsection