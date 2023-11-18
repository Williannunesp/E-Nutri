@extends('layout')

@section('titulo')
    E-Nutri Professor
@endsection

@section('cabecalho')
    E-Nutri
@endsection
@section('tipopagina')
Agendar Paciente para Primeira Consulta
@endsection
@section('menuusuario')
        <li><a class="dropdown-item" href="#">{{$user}}</a></li>

        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="{{route('showuser')}}">Gerenciar Usuários</a></li>
        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="{{route('signout')}}">Sair</a></li>

@endsection
@section('tipopagina')
Agendar Primeira Consulta
@endsection
@include('Menssagem/flash')

@section('conteudo')

    @section('navbar')
    <div class="sb-sidenav-menu-heading">Voltar</div>
    <a class="nav-link" href="{{route('buscaagenda')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
      Voltar
    </a>


    @endsection
              <form action="{{route('saveagenda')}}" method="POST">
                @csrf
                    <div class="container">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="name" autocomplete="name" name="name" type="text" required placeholder="Enter your first name" />
                                    <label for="name">Nome do Paciente: <b style="color: red">*</b></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="tel" name="tel" autocomplete="tel" type="number" required placeholder="Enter your first name" />
                                    <label for="tel">Telefone: <b style="color: red">*</b></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="data" name="data" autocomplete="data" type="date" required placeholder="Enter your first name" />
                                    <label for="data">Data: <b style="color: red">*</b></label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="hora" name="hora" autocomplete="hora" type="text" required placeholder="Enter your first name" />
                                    <label for="hora">Hora: <b style="color: red">*</b></label>
                                </div>
                            </div>
                                    <div class="col col-2"> <br>
                                        @foreach ($statu as $status)
                                        <input class="form-control" id="status" name="status" autocomplete="status" type="text" style="font-weight: bold; color: red" value="{{$status->name}}" disabled />

                                        @endforeach
                                </div> <br>
                                <div class="row">
                                    <div class="col-2"><br><br><br>
                                        <button class="btn btn-success btn-lg float-right"  stype="submit">Agendar</button>
                                    </div>

                                </div>
                        </div>
                    </div>
                </form>


@endsection


