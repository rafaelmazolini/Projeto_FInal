@extends('layouts.main')

@section('title', 'Raspadinha Cursos')

@section ('content')  


  @foreach($cursos as $curso)

  <form action="{{ route('pagina-curso', [$curso, 'secretaria', 'aluno' => 1]) }}" method="get">
  
  <div id="cards-container" class="row">
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="/img/espaco.jpg" alt="Cursos">
      <div class="card-body">
        <h5 class="card-title">{{$curso -> nome}}</h5>
        <p class="card-text">{{ $curso -> descricao_simplificada }}</p>
        <a href="{{ route('pagina-curso', [$curso, 'secretaria', 'aluno' => 1]) }}" class="btn btn-primary">Ver mais</a>
      </div>
    </div>
  </div>

  </form>
      
  @endforeach

@endsection


