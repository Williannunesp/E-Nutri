@extends('layout')

@section('titulo')
E-Nutri Professor
@endsection

@section('cabecalho')
E-Nutri
@endsection
@section('tipopagina')
Selecione um agendamento para inciar a consulta
@endsection
@section('menuusuario')
        <li><a class="dropdown-item" href="#">{{$user}}</a></li>

        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="{{route('showuser')}}">Gerenciar Usuários</a></li>
        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="{{route('signout')}}">Sair</a></li>

@endsection
@section('navbar')

{{-- <li class="nav-item">
    <a class="nav-link" href="{{route('home')}}"> <i class="fas fa-arrow-alt-circle-left"></i><span class="ttip">Inicio</span></a>
</li> --}}
<div class="sb-sidenav-menu-heading">Agendamento Primeira Consulta</div>
<a class="nav-link" href="{{route('telacadagenda')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
   Agendar Primeira Consulta
</a>

<div class="sb-sidenav-menu-heading">Voltar</div>
<a class="nav-link" href="{{route('home')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
   Voltar
</a>


@endsection

@section('conteudo')

@include('Menssagem/flash')

<div class="card-body">
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>Nome Completo</th>
                <th>Telefone</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Status</th>



            </tr>
        </thead>

        <tbody>
            @foreach ($agendamentopc as $agendamentopcs)




            <tr>

                <td><a style="text-decoration: none; color: black" href="{{route('showagenda', ['id' => $agendamentopcs->id])}}">{{ $agendamentopcs->name }}</a></td>
                <td><a style="text-decoration: none; color: black" href="{{route('showagenda', ['id' => $agendamentopcs->id])}}">{{ $agendamentopcs->telefone }}</a></td>
                <td><a style="text-decoration: none; color: black" href="{{route('showagenda', ['id' => $agendamentopcs->id])}}">{{ $agendamentopcs->data }}</a></td>
                <td><a style="text-decoration: none; color: black" href="{{route('showagenda', ['id' => $agendamentopcs->id])}}">{{ $agendamentopcs->hora }}</a></td>
                <td><a style="text-decoration: none; color: black" href="{{route('showagenda', ['id' => $agendamentopcs->id])}}">{{ $agendamentopcs->status->name }}</a></td>

            </tr>
            @endforeach


        </tbody>
    </table>
</div>




@endsection
