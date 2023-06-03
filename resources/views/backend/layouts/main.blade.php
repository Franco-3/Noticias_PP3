<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <a href="#" class="navbar-brand text-info">Noticias</a>
        <button type="button" data-target="#navbarsExample02" aria-controls="navbarsExample02" data-toggle="collapse" class="navbar-toggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" ></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav mr-auto">
                @section('menu')
                <li class="nav-item active">
                    <a href="{{ route('noticias.index') }}" class="nav-link">Noticias<span class="sr-only"></span></a>
                </li>
                <li class="nav-item"><a href="{{ route('noticias.create') }}" class="nav-link">Crear Noticia</a></li>
                <li class="nav-item active">
                    <a href="{{ route('categorias.index') }}" class="nav-link">Categorias<span class="sr-only"></span></a>
                </li>
                <li class="nav-item"><a href="{{ route('categorias.create') }}" class="nav-link">Crear Categoria</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Usuarios</a></li>
                @show
            </ul>
            <ul class="navbar-nav ms-auto me-5">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                <li class="nav-item text-light d-flex">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>
                @endif
                @if (Route::has('register'))
                    <li class="nav-item text-light">
                        <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}</a>                        
                        <ul class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                    Cerrar Sesión
                                                    </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                               @csrf
                            </form>
                        </ul>
                </li>            
            @endguest            
           @show        
           </ul>                    

        </div>
    
    </nav>

        <div class="jumbotron"><div class="container">@yield('content')</div></div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>