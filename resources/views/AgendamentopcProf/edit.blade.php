@extends('layout')

@section('titulo')
    Agendamento de Consultas
@endsection

@section('cabecalho')
    Alterar Agendamento de Consultas
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
              <form action="{{route('updateagenda', ['id' => $agenda->id])}}" method="POST">
                @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col col-5">
                                <label for="nome">Nome do Paciente: <b style="color: red">*</b></label>
                                <input type="text" class="form-control mb-2" autocomplete="name" name="name" id="nome" value="{{$agenda->name}}" disabled required>
                            </div>
                            <div class="col col-3">
                                <label for="tel">Telefone: <b style="color: red">*</b></label>
                                <input type=" number" autocomplete="tel"  class="form-control mb-2" name="tel" id="tel" value="{{$agenda->telefone}}" disabled>
                            </div>
                            <div class="col col-5">
                                <label for="data">Data: <b style="color: red">*</b></label>
                                <input type="date"  class="form-control mb-2" name="data" id="data"  value="{{$agenda->data}}" required>
                            </div>
                    
                        
                            <div class="col col-2">
                                <label for="hora">Hora: <b style="color: red">*</b></label>
                                <input type="hora" class="form-control mb-2" name="hora" id="hora" value="{{$agenda->hora}}" >
                            </div>
                        </div>

                        
                                
                                    <div class="col col-2 mt-3" style="margin-top: 10px">
                                        @foreach ($statu as $status)

                                        <input type="status" class="form-control mb-2" name="hora" id="hora" style="color: red; font-weight: bold" value="{{$status->name}}" disabled>

                                        @endforeach
                                    
                                </div>
                                <div class="row">
                            <div class="col-2" style="margin-top: 20px"><br><br><br>
                                <button class="btn btn-success btn-lg float-right"  stype="submit">Salvar</button>
                            </div>
                        </div>
                            <div class="col-1"></div>
                </form>
                        </div>
                    </div>
                
@endsection


