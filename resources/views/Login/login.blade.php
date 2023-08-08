<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style-login.css') }}">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <title>Acesso Restrito</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <h1 class="text-center login-title"></h1>
                <div class="account-wall">
                    <div class="text-center">
                    <img class="" alt="Responsive image" src="{{asset('img/Logo-Oficial.png')}}"
                        alt="">
                    </div>
                    <form class="form-signin" action="{{route('index')}}" method="GET">
                        @csrf
                    <input type="text" class="form-control" name="name" placeholder="Nome do Usuário" required autofocus>
                    <input type="password" class="form-control" name="password" placeholder="Senha" required>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        Entrar</button>

                    </form>
        </div>
    </div>
</body>
</html>