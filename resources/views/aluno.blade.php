<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Raspadinha Cursos</title>
  
  <script></script>

</head>
<body>

  <form action="{{ route('pagina-inicio') }}" method="get">
    <button>Menu</button>
  </form>

  @if($alteraAux == 0)
  
    <h1>{{ $aluno -> nome }}</h1>
    
    <p>Nome: {{ $aluno -> nome }}</p>
    <p>CPF: {{ $aluno -> cpf }}</p>
    <p>Endereço: {{ $aluno -> endereco }}</p>
    <p>Filme favorito: {{ $aluno -> filme }}</p>
    <h4>Informações de Login</h4>
    <p>Usuário: {{ $aluno -> usuario }}</p>
    
    <form action="{{ route('altera-dados-botao-A', $aluno) }}" method="get">
      <button>Editar Dados</button>
    </form>
    
    <form action="{{ route('deleta-aluno', $aluno) }}" method="post">
      {{ csrf_field() }}
      <button>Excluir aluno</button>
    </form>
    
    <form action="{{ route('troca-senha-botao-A', $aluno) }}" method="get">
      {{ csrf_field() }}
      <button>Trocar senha</button>
    </form>
  
  @endif
  
  @if($alteraAux == 1)
  
    <h1>{{ $aluno -> nome }}</h1>
    
    <form action="{{ route('altera-dados-A', $aluno)}} " method="post">
    
      {{ csrf_field() }} 
      
      <label for="nome">Nome Completo: </label>
      <input type="text" name="nome" value="{{ $aluno -> nome }}"> <br>
      
      <label for="cpf">CPF: </label>
      <input type="text" name="cpf" value="{{ $aluno -> cpf }}"> <br>
      
      <label for="endereco">Endereço: </label>
      <input type="text" name="endereco" value="{{ $aluno -> endereco }}"> <br>
      
      <label for="filme">Filme favorito: </label>
      <input type="text" name="filme" value="{{ $aluno -> filme }}"> <br>
      
      <label for="usuario">Usuário: </label>
      <input type="text" name="usuario" value="{{ $aluno -> usuario }}"> <br>
      
      <button>Salvar</button>
    
    </form>
    
    <form action="{{ route('deleta-aluno', $aluno) }}" method="post">
      {{ csrf_field() }}
      <button>Excluir aluno</button>
    </form>
  
  @endif
  
  @if($alteraAux == 2)
  
  <h1>{{ $aluno -> nome }}</h1>
    
    <p>Nome: {{ $aluno -> nome }}</p>
    <p>CPF: {{ $aluno -> cpf }}</p>
    <p>Endereço: {{ $aluno -> endereco }}</p>
    <p>Filme favorito: {{ $aluno -> filme }}</p>
    <h4>Informações de Login</h4>
    <p>Usuário: {{ $aluno -> usuario }}</p>
    
    <form action="{{ route('altera-dados-botao-A', $aluno) }}" method="get">
      <button>Editar Dados</button>
    </form>
    
    <form action="{{ route('deleta-aluno', $aluno) }}" method="post">
      {{ csrf_field() }}
      <button>Excluir aluno</button>
    </form>
    
    <form action="{{ route('troca-senha-A', $aluno) }}" method="post">
      {{ csrf_field() }}
      
      <label for="senha">Nova senha: </label>
      <input type="password" name="senha">
      
      <button>Salvar</button>
      
    </form>
  
  @endif
  
  <h2>Meus Cursos</h2>
  
  @if(count($aluno -> cursos) == 0)
    <p>Não está matriculado em nenhum curso.</p>
  @endif
  
  @foreach($aluno -> cursos as $matriculado)
  
    <a href="{{ route('pagina-curso', [$matriculado, 'aluno']) }}">{{ $matriculado -> nome }}</a><br>
  
  @endforeach
  
  <h2>Cursos Disponíveis</h2>
  
  @php($matriculadoAux = 0)
  
  @foreach($cursos as $curso)
  
    @php($matriculadoAux = 0)
  
    @foreach($aluno -> cursos as $matriculado)
    
      @if($curso -> id == $matriculado -> id)
      
        @php($matriculadoAux = 1)
      
      @endif
    
    @endforeach
    
    @if($matriculadoAux == 0)
    
    <p>{{ $curso -> nome }}</p>
      <form action="{{ route('matricula-aluno', [$aluno, $curso]) }}" method="get">
        <button>Matricular-se</button>
      </form>
    
    @endif
  
  @endforeach
  
  @if($matriculadoAux == 1)
    
    <p>Nenhum curso disponível.</p>
  
  @endif
  
</body>
</html>