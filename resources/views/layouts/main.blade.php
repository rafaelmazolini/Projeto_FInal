<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fontes do Google -->
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        
        <!-- CSS Bootstrap -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="scripts.js"></script>

    </head>
    <body>
        <header>
            <nav class="navber navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar"> 
                <a href="/" class="navbar-brand">
                    <img src="/img/logo.jpg" alt="Logo">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('pagina-login') }}" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pagina-cadastro') }}" class="nav-link">Cadastro</a>
                    </li>
                </ul>
            </div>
            </nav>
        </header>
        
     
        <hr />

        @yield('content')

        <footer>
            <p>Raspadinha Cursos &copy; 2022</p>
        </footer>

    </body>
</html>
