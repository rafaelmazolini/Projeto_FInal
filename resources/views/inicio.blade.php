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
                        <p class="card-pariticpantes">Vagas restantes: {{ $curso -> max_alunos - $curso -> n_alunos }} </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
 

@endsection