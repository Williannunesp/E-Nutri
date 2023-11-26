@extends('layout')

@section('titulo')
    E-Nutri Aluno
@endsection
@section('tipopagina')
Alterar Dados de Agendamento Retorno
@endsection
@section('cabecalho')
    E-Nutri
@endsection
@section('menuusuario')
        <li><a class="dropdown-item" href="#">{{$user}}</a></li>
        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="{{route('signout')}}">Sair</a></li>

@endsection
@section('tipopagina')
   Alterar Agendamento
@endsection

@section('conteudo')

    @section('navbar')
    <div class="sb-sidenav-menu-heading">Voltar</div>
    <a class="nav-link" href="{{route('gerenciarretorno')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
      Voltar
    </a>

    @endsection
              <form action="    {{route('updateretorno', ['id' => $agenda->id])}}" method="POST">
                @csrf
                    <div class="container">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="name" autocomplete="name" name="name" type="text" disabled value="{{$agenda->name}}" disabled required placeholder="Enter your first name" />
                                    <label for="name">Nome do Paciente: <b style="color: red">*</b></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="tel" name="tel" autocomplete="tel" type="number" value="{{$agenda->telefone}}" required placeholder="Enter your first name" />
                                    <label for="tel">Telefone: <b style="color: red">*</b></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="data" name="data" autocomplete="data" type="date" value="{{$agenda->data}}" required placeholder="Enter your first name" />
                                    <label for="data">Data: <b style="color: red">*</b></label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="hora" name="hora" autocomplete="hora" type="text" value="{{$agenda->hora}}" required placeholder="Enter your first name" />
                                    <label for="hora">Hora: <b style="color: red">*</b></label>
                                </div>
                            </div>
                                    <div class="col col-2"> <br>

                                        <input class="form-control" id="status" name="status" autocomplete="status" type="text"  style="font-weight: bold" value="{{$agenda->status->name}}" disabled />


                                </div> <br>
                                <div class="row">
                                    <div class="col-2" style="margin-top: 20px"><br><br><br>
                                        <button class="btn btn-success btn-lg float-right"  stype="submit">Salvar</button>
                                    </div>
                                </div>
                        </div>

                </form>


@endsection


