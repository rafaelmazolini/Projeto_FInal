@extends('layouts.main')

@section('title', 'Raspadinha Cursos - Secretária')

@section ('content')  
  
  <h1>Secretaria</h1>
  
  </br>

  <form action="{{ route('crud-professores') }}" method="get">
    
    {{ csrf_field() }}
  
    <button>PROFESSORES</button>
    
  </form>
  
  </br>
  <form action="{{ route('crud-alunos') }}" method="get">
  
    {{ csrf_field() }}
    
    <button>Alunos</button>
    
  </form>
  
  </br>
  
  <form action="{{ route('crud-cursos') }}" method="get">
  
    {{ csrf_field() }}
    
    <button>CURSOS</button>
    
  </form>
  
@endsection