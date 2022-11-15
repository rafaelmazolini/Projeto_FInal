<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Raspadinha Cursos</title>

</head>
<body>

  @if($alteraAux == 0)
  
    <h1>{{ $aluno -> nome }}</h1>
    
    <p>Nome: {{ $aluno -> nome }}</p>
    <p>CPF: {{ $aluno -> cpf }}</p>
    <p>Endereço: {{ $aluno -> endereço }}</p>
    <p>Filme favorito: {{ $aluno -> filme }}</p>
    <h4>Informações de Login</h4>
    <p>Usuário: {{ $aluno -> usuario }}</p>
    
    <form action="{{ route('altera-dados-botao', $aluno) }}" method="get">
      <button>Editar Dados</button>
    </form>
  
  @endif
  
  @if($alteraAux == 1)
  
    <h1>{{ $aluno -> nome }}</h1>
    
    <form action="{{ route('altera-dados', $aluno)}} " method="post">
    
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
  
  @endif
  
</body>
</html>