@extends('layouts.main')

@section('title', 'Raspadinha Cursos')

@section ('content')  

<h1>Cursos</h1>
  
<form action="{{ route('cria-curso') }}" method="post">
  
  {{ csrf_field() }}
  
  <h3>Criar Curso</h3>
  
  <div>
    <label for="nome">Nome</label>
    <input type="text" name="nome">
    
    <label for="descricao_completa">Descrição Completa</label>
    <input type="text" name="descricao_completa">
    
    <label for="descricao_simplifica">Descrição Simplificada</label>
    <input type="text" name="descricao_simplificada">
    
    <label for="min_alunos">Mínimo de alunos</label>
    <input type="text" name="min_alunos">
    
    <label for="max_alunos">Máximo de alunos</label>
    <input type="text" name="max_alunos">
    
    <button>Salvar</button>
  </div>
  
</form>

@foreach($cursos as $curso)

  <form action="{{ route('pagina-curso', [$curso, 'secretaria', 'aluno' => 1]) }}" method="get">

    <button>{{$curso -> nome}}</button>

  </form> 

@endforeach
  
@endsection