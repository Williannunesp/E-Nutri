@extends('layout')

@section('titulo')
E-Nutri Aluno
@endsection

@section('cabecalho')
E-Nutri
@endsection
@section('tipopagina')
Lista de Agendamentos Pirmeira Consulta
@endsection
@section('menuusuario')
        <li><a class="dropdown-item" href="#">{{$user}}</a></li>
        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="{{route('signout')}}">Sair</a></li>

@endsection
@section('navbar')

{{-- <li class="nav-item">
    <a class="nav-link" href="{{route('home')}}"> <i class="fas fa-arrow-alt-circle-left"></i><span class="ttip">Inicio</span></a>
</li> --}}
<div class="sb-sidenav-menu-heading">Primeira Consulta</div>
<a class="nav-link" href="{{route('telacadagenda')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
   Agendar Consulta
</a>
<a class="nav-link" href="{{route('listaagenda')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
   Iniciar Consulta
</a>
<a class="nav-link" href="{{route('buscaatendidos')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
   Pacientes Atendidos
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
                <th>Editar</th>


            </tr>
        </thead>

        <tbody>
            @foreach ($agendamentopc as $agendamentopcs)




            <tr>

                <td>{{ $agendamentopcs->name }}</td>
                <td>{{ $agendamentopcs->telefone }}</td>
                <td>{{  \Carbon\Carbon::parse($agendamentopcs->data)->format('d/m/Y') }}</td>
                <td>{{ $agendamentopcs->hora }}</td>
                <td>{{ $agendamentopcs->status->name }}</td>
                <td><a href="{{route('telaeditagenda', ['id' => $agendamentopcs->id])}}">
                    <button class="btn btn-primary" style="display: flex" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                          </svg>
                        </button></a>
                </td>
            </tr>
            @endforeach


        </tbody>
    </table>
</div>




@endsection
