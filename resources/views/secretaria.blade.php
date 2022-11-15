<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Raspadinha Cursos</title>
  
</head>
<body>
  
  <h1>Secretaria</h1>
  
  <form action="{{ route('crud-professores') }}" method="get">
    
    {{ csrf_field() }}
  
    <button>PROFESSORES</button>
    
  </form>
  
  <form action="{{ route('crud-alunos') }}" method="get">
  
    {{ csrf_field() }}
    
    <button>ALUNOS</button>
    
  </form>
  
  <form action="{{ route('crud-cursos') }}" method="get">
  
    {{ csrf_field() }}
    
    <button>CURSOS</button>
    
  </form>
  
</body>
</html>