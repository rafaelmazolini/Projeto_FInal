@extends('layouts.main')

@section('title', 'Raspadinha Cursos')

@section ('content')  







<div class="id team-area">
    <div class="class container">
        <div class="class row">
            <div class="col-12">
                <h3 class="main-title">Cursos</h3>
            </div>
            </br>
            @foreach($cursos as $curso)
            <div class="col-md-3">
                <div class="card">
                    <img src="/img/espaco.jpg" class="card-img-top" alt="{{$curso -> nome}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$curso -> nome}}</h5>
                        <p class="card-text">{{ $curso -> descricao_simplificada }}</p>
                        <p class="card-pariticpantes">Capacidade Máxima: {{ $curso -> max_alunos }} alunos</p>
                        <a href="{{ route('pagina-curso', [$curso, 'secretaria', 'aluno' => 1]) }}" class="btn primary">Ver mais</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
 

@endsection