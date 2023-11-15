@extends('layout')

@section('titulo')
    E-Nutri
@endsection

@section('cabecalho')
    E-Nutri
@endsection
@section('tipopagina')
    Verificar os Dados do Agendamento
@endsection
@section('menuusuario')
        <li><a class="dropdown-item" href="#">{{$user}}</a></li>

        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="{{route('showuser')}}">Gerenciar Usuários</a></li>
        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="{{route('signout')}}">Sair</a></li>

@endsection

@section('conteudo')

    @section('navbar')
    <div class="sb-sidenav-menu-heading">Voltar</div>
    <a class="nav-link" href="{{route('listaretorno')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
      Voltar
    </a>

    @endsection


    <div class="container">
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="name" autocomplete="name" name="name" type="text" value="{{$agenda->name}}" disabled required placeholder="Enter your first name" />
                    <label for="name">Nome do Paciente: <b style="color: red">*</b></label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="tel" name="tel" autocomplete="tel" type="number" value="{{$agenda->telefone}}" disabled required placeholder="Enter your first name" />
                    <label for="tel">Telefone: <b style="color: red">*</b></label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="data" name="data" autocomplete="data" type="date" value="{{$agenda->data}}" disabled required placeholder="Enter your first name" />
                    <label for="data">Data: <b style="color: red">*</b></label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="hora" name="hora" autocomplete="hora" type="text" value="{{$agenda->hora}}" disabled required placeholder="Enter your first name" />
                    <label for="hora">Hora: <b style="color: red">*</b></label>
                </div>
            </div>
                <div class="row">
                    <div class="col-2" style="margin-top: 20px"><br><br><br>
                        @foreach ($dadospaci as $dadospacis)
                        <a href="{{route('editpaciretorno', ['id' => $dadospacis->id])}}"><button class="btn btn-primary btn-lg float-right"  stype="submit">Iniciar Consulta</button></a>
                    </div>@endforeach
                </div>
        </div>

                    </div>

@endsection


