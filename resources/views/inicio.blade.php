<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Raspadinha Cursos</title>
  <link rel="stylesheet" href="css\inicio.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
  
  <div class="titulo">
    <img id="icon" src="img\raspadinhaicon.png" alt="raspadinha-icon">
    <h1>Raspadinha Cursos</h1>
  </div>
  
  <form action="{{ route('pagina-login') }}" method="get">
    <button>Login</button>
  </form>
  
  @foreach($cursos as $curso)
    
    <h3>{{$curso -> nome}}</h3>
    <p>{{ $curso -> descricao_simplificada }}</p>
  
  @endforeach
  
</body>
</html>