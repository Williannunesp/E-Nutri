@extends('layout')

@section('titulo')
E-Nutri Aluno
@endsection

@section('cabecalho')
E-Nutri
@endsection
@section('tipopagina')
Selecione um paciente para inciar o agendamento
@endsection
@section('menuusuario')
        <li><a class="dropdown-item" href="#">{{$user}}</a></li>
        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="{{route('signout')}}">Sair</a></li>


@endsection
@section('navbar')


<div class="sb-sidenav-menu-heading">Voltar</div>
<a class="nav-link" href="{{route('gerenciarretorno')}}">
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




            </tr>
        </thead>

        <tbody>
            @foreach ($pacientes as $paciente)




            <tr>

                <td><a style="text-decoration: none; color: black" href="{{route('cadretorno', ['id' => $paciente->id])}}">{{ $paciente->name }}</a></td>
                <td><a style="text-decoration: none; color: black" href="{{route('cadretorno', ['id' => $paciente->id])}}">{{ $paciente->celular }}</a></td>


            </tr>
            @endforeach


        </tbody>
    </table>
</div>




@endsection
