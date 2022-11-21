@extends('layouts.main')

@section('title', 'Raspadinha Cursos - login')

@section ('content')  

  <img src="/img/logo.jpg"  width="200" left="200" alt="logo">
  <h1>Raspadinha Cursos</h1>
  

  <form action="{{ route('pagina-login') }}" method="get">
    <button>Login</button>
  </form>
  
@endsection