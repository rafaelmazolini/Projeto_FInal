@extends('layouts.main')

@section('title', 'Raspadinha Cursos - Cadastro - Cursos')

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
    
    <label for="min_alunos">Mínimo de Alunos</label>
    <input type="text" name="min_alunos">
    
    <label for="max_alunos">Máximo de Alunos</label>
    <input type="text" name="max_alunos">
    
    <button>Salvar</button>
  </div>
  
</form>
  
@endsection