@extends('layout')

@section('titulo')
    Agendamento de Consultas
@endsection

@section('cabecalho')
    E-Nutri
@endsection
@section('tipopagina')
Agendar Primeira Consulta
@endsection


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
                        <div class="row">
                            <div class="col col-4">
                                <label for="nome">Nome do Paciente: <b style="color: red">*</b></label>
                                <input type="text" class="form-control mb-2" autocomplete="name" name="name" id="nome"  required>
                            </div>

                            <div class="col col-3">
                                <label for="tel">Telefone: <b style="color: red">*</b></label>
                                <input type=" number" autocomplete="tel"  class="form-control mb-2" name="tel" id="tel" >
                            </div>
                            <div class="col col-3">
                                <label for="data">Data: <b style="color: red">*</b></label>
                                <input type="date"  class="form-control mb-2" name="data" id="data"  required>
                            </div>


                            <div class="col col-2">
                                <label for="hora">Hora: <b style="color: red">*</b></label>
                                <input type="hora" class="form-control mb-2" name="hora" id="hora" >
                            </div>
                            </div>



                                    <div class="col col-2"> <br>
                                        @foreach ($statu as $status)

                                        <input type="status" class="form-control mb-2" name="hora" id="hora" style="color: red; font-weight: bold" value="{{$status->name}}" disabled>

                                        @endforeach
                                </div> <br>
                                <button class="btn btn-success btn-lg float-right"  stype="submit">Agendar</button>
                        </div>
                    </div>
                </form>

@endsection


