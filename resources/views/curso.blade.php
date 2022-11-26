@extends('layouts.main')

@section('title', 'Raspadinha Cursos - curso')

@section ('content')  

  @if($usuario == 'secretaria' || $usuario == 'moderador')
    
    @if($alteraAux == 0)
    
      <h1>{{ $curso -> nome }}</h1>
      
      <p>Nome: {{ $curso -> nome }}</p>
      <p>Descrição completa: {{ $curso -> descricao_completa }}</p>
      <p>Descrição simplificada: {{ $curso -> descricao_simplificada }}</p>
      <p>Mínimo de alunos: {{ $curso -> min_alunos }}</p>
      <p>Máximo de alunos: {{ $curso -> max_alunos }}</p>
      <p>Número de alunos matriculados: {{ $curso -> n_alunos }}</p>
      <p>Status do curso: {{ $curso -> status }}</p>
      @if($curso -> professor != null)
        <p>Professor: {{ $curso -> professor -> nome }}</p>
      
      @else
        <p>Professor: Ainda não designado.</p>
      @endif

      
      <h3>Alunos Matriculados</h3>
      @foreach($curso -> alunos as $aluno)
      
        <p>{{ $aluno -> nome }}</p>
        
      @endforeach
      
      <form action="{{ route('altera-dados-botao-C', $curso) }}" method="get">
        <button>Editar Dados</button>
      </form>
      
      <form action="{{ route('deleta-curso', $curso) }}" method="post">
        {{ csrf_field() }}
        <button>Excluir curso</button>
      </form>
  
    @endif
  
    @if($alteraAux == 1)
  
      <h1>{{ $curso -> nome }}</h1>
      
      <form action="{{ route('altera-dados-C', $curso)}} " method="post">
      
        {{ csrf_field() }} 
        
        <label for="nome">Nome: </label>
        <input type="text" name="nome" value="{{ $curso -> nome }}"> <br>
        
        <label for="descricao_completa">Descrição completa: </label>
        <input type="text" name="descricao_completa" value="{{ $curso -> descricao_completa }}"> <br>
        
        <label for="descricao_simplificada">Descrição simplificada: </label>
        <input type="text" name="descricao_simplificada" value="{{ $curso -> descricao_simplificada }}"> <br>
        
        <label for="min_alunos">Mínimo de alunos: </label>
        <input type="text" name="min_alunos" value="{{ $curso -> min_alunos }}"> <br>
        
        <label for="max_alunos">Máximo de alunos: </label>
        <input type="text" name="max_alunos" value="{{ $curso -> max_alunos }}"> <br>
        
        <button>Salvar</button>
      
      </form>
      
      <form action="{{ route('deleta-curso', $curso) }}" method="post">
        {{ csrf_field() }}
        <button>Excluir curso</button>
      </form>
  
    @endif
  
  @endif
  
  @if($usuario == 'aluno')
    
      <h1>{{ $curso -> nome }}</h1>
      
      <p>Nome: {{ $curso -> nome }}</p>
      <p>Descrição completa: {{ $curso -> descricao_completa }}</p>
      <p>Descrição simplificada: {{ $curso -> descricao_simplificada }}</p>
      <p>Status do curso: {{ $curso -> status }}</p>
      @if($curso -> professor != null)
        <p>Professor: {{ $curso -> professor -> nome }}</p>
      @endif
      @if($curso -> professor == null)
        <p>Professor: Não designado.</p>
      @endif
      
      @foreach ($alunoCurso as $alCur)
          @if ($alCur -> aluno_id == $aluno -> id & $alCur -> curso_id == $curso -> id)
              @if($alCur -> nota == NULL)
                <p>Nota: --/10</p>
              @else
                <p>Nota: {{ $alCur -> nota }}</p>
              @endif
          @endif
      @endforeach
    
  @endif
  
  @if($usuario == 'professor')
    
      <h1>{{ $curso -> nome }}</h1>
      
      <p>Nome: {{ $curso -> nome }}</p>
      <p>Descrição completa: {{ $curso -> descricao_completa }}</p>
      <p>Descrição simplificada: {{ $curso -> descricao_simplificada }}</p>
      <p>Mínimo de alunos: {{ $curso -> min_alunos }}</p>
      <p>Máximo de alunos: {{ $curso -> max_alunos }}</p>
      <p>Número de alunos matriculados: {{ $curso -> n_alunos }}</p>
      <p>Status do curso: {{ $curso -> status }}</p>
      <p>Professor: {{ $curso -> professor -> nome }}</p>
      
      <h3>Alunos Matriculados</h3>
      @foreach($curso -> alunos as $aluno)
      
        <p>{{ $aluno -> nome }}</p>
    
        @php($notaAux = 0)
        
        @foreach($alunoCurso as $alCur)
          @if($alCur -> curso_id == $curso -> id & $alCur -> aluno_id == $aluno -> id)
            <p>Nota: {{ $alCur -> nota }}</p>
            @php($notaAux = 0)
          @endif
          
          @if($alCur -> nota != NULL)
            @php($notaAux = 1)
          @endif
        @endforeach
        
        @if($notaAux == 0)
          <form action="{{ route('atribui-nota', [$aluno, $curso]) }}" method="post">
            {{ csrf_field() }}
            <input type="text" name="nota" placeholder="Atribuir média do aluno">
            <button>Salvar</button>
          </form>
        @endif
        
      @endforeach
  
  @endif
  
@endsection