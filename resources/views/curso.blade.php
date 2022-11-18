<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Raspadinha Cursos</title>

</head>
<body>

  <form action="{{ route('pagina-inicio') }}" method="get">
    <button>Menu</button>
  </form>

  @if($alteraAux == 0)
  
    <h1>{{ $curso -> nome }}</h1>
    
    <p>Nome: {{ $curso -> nome }}</p>
    <p>Descrição completa: {{ $curso -> descricao_completa }}</p>
    <p>Descrição simplificada: {{ $curso -> descricao_simplificada }}</p>
    <p>Mínimo de alunos: {{ $curso -> min_alunos }}</p>
    <p>Máximo de alunos: {{ $curso -> max_alunos }}</p>
    <p>Número de alunos matriculados: {{ $curso -> n_alunos }}</p>
    <p>Status do curso: {{ $curso -> status }}</p>
    
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
  
</body>
</html>