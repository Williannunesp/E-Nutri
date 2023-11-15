@extends('layout')

@section('titulo')
E-Nutri Aluno
@endsection

@section('cabecalho')
E-Nutri
@endsection
@section('tipopagina')
Lista de Pacientes Atendidos
@endsection
@section('menuusuario')
        <li><a class="dropdown-item" href="#">{{$user}}</a></li>
        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="{{route('signout')}}">Sair</a></li>

@endsection
@section('navbar')

<div class="sb-sidenav-menu-heading">Voltar</div>
<a class="nav-link" href="{{route('buscaagenda')}}">
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

                <td>{{ $agendamentopcs->name }}</td>
                <td>{{ $agendamentopcs->telefone }}</td>
                <td>{{ \Carbon\Carbon::parse($agendamentopcs->data)->format('d/m/Y')}}</td>
                <td>{{ $agendamentopcs->hora }}</td>
                <td>{{ $agendamentopcs->status->name }}</td>


            </tr>
            @endforeach



        </tbody>
    </table>
</div>




@endsection
