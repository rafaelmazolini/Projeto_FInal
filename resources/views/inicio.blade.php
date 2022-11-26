@extends('layouts.main')

@section('title', 'Raspadinha Cursos')

@section ('content')  

@foreach($cursos as $curso)

  <h1>CURSOS</h1>
    
    <h3>{{$curso -> nome}}</h3>
    <p>{{ $curso -> descricao_simplificada }}</p>
  
  @endforeach

@endsection
