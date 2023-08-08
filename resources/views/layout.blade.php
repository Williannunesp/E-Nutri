<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <!------ Include the above in your HEAD tag ---------->

    <title>@yield('titulo')</title>
</head>

<body>



    <div id="wrapper" class="animate">
        <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="" title="Tela Incial">E-NUTRI</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav animate side-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="#"> <i class="fas fa-question-circle"></i><span class="ttip">Em Breve...</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> <i class="fa fa-question-circle"></i><span class="ttip">Em Breve...</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> <i class="fa fa-question-circle"></i><span class="ttip">Em Breve...</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> <i class="fa fa-user"></i><span class="ttip">Gerenciar
                                Usuários</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> <i class="fa fa-question-circle"></i><span
                                class="ttip">Em Breve...</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-md-auto d-md-flex">

                    <li class="nav-item">
                        <a class="nav-link" href="#" title="Sair do Sistema"><i class="fa fa-power-off"></i> Sair</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col">



                </div>
            </div>
            <div class="col">
                <div class="card">



                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">@yield('cabecalho')</h5>
                        @yield('conteudo')

                        <img  src="img/EmBreve.png"



                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

</body>

</html>