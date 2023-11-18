@extends('layout')

@section('titulo')
E-Nutri Aluno
@endsection

@section('cabecalho')
E-Nutri
@endsection
@section('tipopagina')
Selecione um paciente para ver prontuário
@endsection
@section('menuusuario')
        <li><a class="dropdown-item" href="#">{{$user}}</a></li>
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
                <th>CPF</th>




            </tr>
        </thead>

        <tbody>
            @foreach ($paciente as $pacientes)




            <tr>

                <td><a style="text-decoration: none; color: black" href="{{route('showpront', ['id' => $pacientes->id])}}">{{ $pacientes->name }}</a></td>
                <td><a style="text-decoration: none; color: black" href="{{route('showpront', ['id' => $pacientes->id])}}">{{ $pacientes->celular }}</a></td>
                <td><a style="text-decoration: none; color: black" href="{{route('showpront', ['id' => $pacientes->id])}}">{{ $pacientes->cpf }}</a></td>

            </tr>
            @endforeach


        </tbody>
    </table>
</div>




@endsection
