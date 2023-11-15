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
            @foreach ($agendamentoret as $agendamentorets)




            <tr>

                <td><a style="text-decoration: none; color: black" href="{{route('showretorno', ['id' => $agendamentorets->id])}}">{{ $agendamentorets->name }}</a></td>
                <td><a style="text-decoration: none; color: black" href="{{route('showretorno', ['id' => $agendamentorets->id])}}">{{ $agendamentorets->telefone }}</a></td>
                <td><a style="text-decoration: none; color: black" href="{{route('showretorno', ['id' => $agendamentorets->id])}}">{{ \Carbon\Carbon::parse($agendamentorets->data)->format('d/m/Y')}}</a></td>
                <td><a style="text-decoration: none; color: black" href="{{route('showretorno', ['id' => $agendamentorets->id])}}">{{ $agendamentorets->hora }}</a></td>
                <td><a style="text-decoration: none; color: black" href="{{route('showretorno', ['id' => $agendamentorets->id])}}">{{ $agendamentorets->status->name }}</a></td>

            </tr>
            @endforeach


        </tbody>
    </table>
</div>




@endsection
