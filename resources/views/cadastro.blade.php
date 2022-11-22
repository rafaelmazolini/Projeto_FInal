@extends('layouts.main')

@section('title', 'Raspadinha Cursos - Cadastro')

@section ('content')  
  
  <h1>Cadastro</h1>

  <form action="{{ route('login') }}" method="post">
    {{ csrf_field() }}
    
   
  
    
   
  
@endsection