<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Raspadinha Cursos</title>
</head>
<body>
  
  <h1>Raspadinha Cursos</h1>
  
  <form action="{{ route('pagina-login') }}" method="get">
    <button>Login</button>
  </form>
  
  @foreach($cursos as $curso)
    
    <h3>{{$curso -> nome}}</h3>
    <p>{{ $curso -> descricao_simplificada }}</p>
  
  @endforeach
  
</body>
</html>