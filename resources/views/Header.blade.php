<!DOCTYPE html>
<html lang="en">
<head>
    <title>Homepage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<nav class="navbar navbar-expand-sm navbar-inverse navbar-dark">
    <div class="container-fluid ">
        <div class="navbar-header ">
            <a class="navbar-brand" href="{{route('Home')}}">Homepage</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="form-group">
                        <button type="submit" class="btn">
                            {{ __('Log Out') }}
                        </button>
                    </div>
                </form>
            @else
                <li><a href="{{ route('register') }}" ><span class="glyphicon glyphicon-user"></span> Cadastro</a></li>
                <li><a href="{{ route('login') }}" ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            @endauth
        </ul>
        <form class="navbar-form navbar-right" action="/action_page.php">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Pesquisar">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{route('listar')}}" >Listar Clientes</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{route('criar')}}" >Criar Cliente</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{route('listarLivro')}}" >Listar Livros</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{route('criarLivro')}}" >Criar Livro</a></li>
        </ul>
    </div>
</nav>
</html>
