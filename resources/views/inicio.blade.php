@extends('layouts.main')

@section('title', 'Raspadinha Cursos - login')

@section ('content')  

  <h1>Raspadinha Cursos</h1>
  

  <form action="{{ route('pagina-login') }}" method="get">
    <button>Login</button>
  </form>
  
@endsection