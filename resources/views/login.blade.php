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
  
  <h1>Login</h1>
  
  <form action="{{ route('login') }}" method="post">
    {{ csrf_field() }}
    
    <div>
    <label for="usuario">Usuário</label>
    <input type="text" name="usuario">
    
    <label for="senha">Senha</label>
    <input type="password" name="senha">
    </div>
    
    <button>Login</button>
    
  </form>
  
</body>
</html>