@extends('layout')

@section('titulo')
    Informações do Agendamento
@endsection

@section('cabecalho')
    Informações do Agendamento
@endsection


@section('conteudo')

    @section('navbar')
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}"> <i class="fas fa-arrow-alt-circle-left"></i><span class="ttip">Inicio</span></a>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}"> <i class="fas fa-arrow-alt-circle-left"></i><span class="ttip">Voltar</span></a>
    </li>


    @endsection



                    <div class="container">
                        <div class="row">
                            <div class="col col-5">
                                <label for="nome">Nome do Paciente: </label>
                                <input type="text" class="form-control mb-2" autocomplete="name" name="name" id="nome" value="{{$agenda->name}}" disabled required>
                            </div>
                            <div class="col col-3">
                                <label for="tel">Telefone: </label>
                                <input type=" number" autocomplete="tel"  class="form-control mb-2" name="tel" id="tel" value="{{$agenda->telefone}}" disabled>
                            </div>
                            <div class="col col-5">
                                <label for="data">Data: </label>
                                <input type="date"  class="form-control mb-2" name="data" id="data"  value="{{$agenda->data}}" disabled required>
                            </div>


                            <div class="col col-2">
                                <label for="hora">Hora: </label>
                                <input type="hora" class="form-control mb-2" name="hora" id="hora" value="{{$agenda->hora}}" disabled> <br>
                            </div>




                                <a href="{{route('telacadpaciente', ['id' => $agenda->paciente->id])}}"> <button name="btn_edit" class="btn btn-primary btn-lg float-right" >Iniciar Consulta</button></a>











                    </div>

@endsection


