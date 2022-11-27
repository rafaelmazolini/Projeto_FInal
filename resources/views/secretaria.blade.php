@extends('layouts.main')

@section('title', 'Raspadinha Cursos - Secretaria')

@section ('content')  
  
  <h2 class="secretaria-titulo">Secretaria</h1>
  
  <form action="{{ route('crud-professores') }}" method="get">
    
    {{ csrf_field() }}
  
    <button class="btn-categorias">Professores</button>
    
  </form>
  
  </br>
  <form action="{{ route('crud-alunos') }}" method="get">
  
    {{ csrf_field() }}
    
    <button class="btn-categorias">Alunos</button>
    
  </form>
  
  </br>
  
  <form action="{{ route('crud-cursos') }}" method="get">
  
    {{ csrf_field() }}
    
    <button class="btn-categorias">Cursos</button>
    
  </form>
  
@endsection