@extends('layout')

@section('titulo')
    Tela Inciial
@endsection

@section('menuusuario')
        <li><a class="dropdown-item" href="#">{{$user}}</a></li>

        <li><hr class="dropdown-divider" /></li>

        <li><a class="dropdown-item" href="{{route('signout')}}">Sair</a></li>

@endsection
@section('cabecalho')

@endsection

@include('Menssagem/flash')
@section('conteudo')



        @section('navbar')
        <a class="nav-link" href="{{route('buscaagenda')}}">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
           Gerenciar Agendamentos
        </a>
        @endsection
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">INICIAR PRIMEIRA CONSULTA</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('listaagenda')}}">Detalhes</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">INICIAR RETORNO</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Detalhes</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
@endsection
