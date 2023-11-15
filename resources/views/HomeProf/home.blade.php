@extends('layout')

@section('titulo')
    E-Nutri Professor
@endsection

@section('cabecalho')
E-Nutri
@endsection
@section('tipopagina')
Inicio
@endsection





@section('menuusuario')
        <li><a class="dropdown-item" href="#">{{$user}}</a></li>

        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="{{route('showuser')}}">Gerenciar Usuários</a></li>
        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="{{route('signout')}}">Sair</a></li>

@endsection
        @section('navbar')

        <div class="sb-sidenav-menu-heading">Primeira Consulta</div>
        <a class="nav-link" href="{{route('buscaagenda')}}">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
           Agendamentos
        </a>

        <div class="sb-sidenav-menu-heading">Retorno</div>

        <a class="nav-link" href="{{route('gerenciarretorno')}}">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
             Agendamentos
        </a>
        <div class="sb-sidenav-menu-heading">Paciente</div>
        <a class="nav-link" href="{{route('gerenciarpaciente')}}">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
           Gerenciar Pacientes
        </a>

        @endsection
        @section('conteudo')
        @include('Menssagem/flash')
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">PRIMEIRA CONSULTA</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('listaagenda')}}">Iniciar Consulta</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">RETORNO</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('listaretorno')}}">Iniciar Consulta</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">PACIENTE</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Prontuário</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>





@endsection
