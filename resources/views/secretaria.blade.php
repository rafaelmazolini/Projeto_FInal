@extends('layouts.main')

@section('title', 'Raspadinha Cursos - Matricula')

@section ('content')  
  
  <h1>Secretaria</h1>
  
  <form action="{{ route('crud-professores') }}" method="get">
    
    {{ csrf_field() }}
  
    <button>PROFESSORES</button>
    
  </form>
  
  </br>
  <form action="{{ route('crud-alunos') }}" method="get">
  
    {{ csrf_field() }}
    
    <button>ALUNOS</button>
    
  </form>
  
  </br>
  
  <form action="{{ route('crud-cursos') }}" method="get">
  
    {{ csrf_field() }}
    
    <button>CURSOS</button>
    
  </form>
  
@endsection