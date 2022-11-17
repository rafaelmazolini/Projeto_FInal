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
  
    <h1>{{ $professor -> nome }}</h1>
    
    <p>Nome: {{ $professor -> nome }}</p>
    <p>CPF: {{ $professor -> cpf }}</p>
    <p>Endereço: {{ $professor -> endereco }}</p>
    <h4>Informações de Login</h4>
    <p>Usuário: {{ $professor -> usuario }}</p>
    
    <form action="{{ route('altera-dados-botao-P', $professor) }}" method="get">
      <button>Editar Dados</button>
    </form>
    
    <form action="{{ route('deleta-professor', $professor) }}" method="post">
      {{ csrf_field() }}
      <button>Excluir professor</button>
    </form>
  
  @endif
  
  @if($alteraAux == 1)
  
    <h1>{{ $professor -> nome }}</h1>
    
    <form action="{{ route('altera-dados-P', $professor)}}" method="post">
    
      {{ csrf_field() }} 
      
      <label for="nome">Nome Completo: </label>
      <input type="text" name="nome" value="{{ $professor -> nome }}"> <br>
      
      <label for="cpf">CPF: </label>
      <input type="text" name="cpf" value="{{ $professor -> cpf }}"> <br>
      
      <label for="endereco">Endereço: </label>
      <input type="text" name="endereco" value="{{ $professor -> endereco }}"> <br>
      
      <label for="usuario">Usuário: </label>
      <input type="text" name="usuario" value="{{ $professor -> usuario }}"> <br>
      
      <button>Salvar</button>
    
    </form>
  
  @endif
  
</body>
</html>