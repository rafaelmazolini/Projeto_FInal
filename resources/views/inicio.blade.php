@extends('layouts.main')

@section('title', 'Raspadinha Cursos')

@section ('content')  

@foreach($cursos as $curso)
  <div style="margin-top: 15px">
    <h3>{{$curso -> nome}}</h3>
    <p>{{ $curso -> descricao_simplificada }}</p>
  </div>    
    
@endforeach

@endsection
