@extends('layouts.main')

@section('title', 'Raspadinha Cursos - Matricula')

@section ('content')  
  
  <h1>Secretaria</h1>
  
  <form action="{{ route('crud-professores') }}" method="post">
    
    {{ csrf_field()}}
  
    <button>PROFESSORES</button>
    
  </form>
  
  <form action="{{ route('crud-alunos') }}" method="post">
  
    {{ csrf_field() }}
    
    <button>ALUNOS</button>
    
  </form>
  
  <form action="{{ route('crud-cursos') }}" method="post">
  
    {{ csrf_field() }}
    
    <button>CURSOS</button>
    
  </form>
  
@endsection