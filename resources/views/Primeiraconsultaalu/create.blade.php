@extends('layout')

@section('titulo')
    E-Nutri Aluno
@endsection

@section('cabecalho')
    E-Nutri
@endsection
@section('tipopagina')
Primeira Consulta
@endsection
@section('menuusuario')
        <li><a class="dropdown-item" href="#">{{$user}}</a></li>
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
    <a class="nav-link" href="{{route('home')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
      Cancelar
    </a>


    @endsection
              <form action="{{route('criaanexopc', ['id' => $agenda->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="container">
                        <div class="row mb-4">
                            <div class="col-md-3 ">
                                <label class="" for="">Descrição Ficha Primeira Consulta: </label>
                                <textarea name="descpc" id="descpc" cols="100" rows="4"></textarea>
                        </div>
                        <div class="mt-3">
                        <label for="fichapc">● Anexar ficha de primeira consulta em formato pdf (arquivo único) <b style="color: red">*</b> </label>
                    </div>
                        <div class="mt-1">
                                <input class="form-control-file" id="fichapc" autocomplete="fichapc" name="fichapc" type="file" required placeholder="Enter your first name" />
                        </div>
                            <div class="col-md-4 mt-5">
                                    <label class="" for="">Descrição Ficha de Avaliação Antropométrica: </label>
                                    <textarea name="descav" id="descav" cols="100" rows="4"></textarea>
                            </div>
                            <div class="mt-3">
                            <label for="fichaav">● Anexar ficha de avaliação antropométrica em formato pdf (arquivo único) <b style="color: red">*</b> </label>
                        </div>
                            <div class="mt-1">
                                    <input class="form-control-file" id="fichaav" autocomplete="fichaav" name="fichaav" type="file" required placeholder="Enter your first name" />
                            </div>
                            <div class="col-md-3 mt-5">

                                <label class="" for="">Descrição Dieta: </label>
                                <textarea name="descdie" id="descdie" cols="100" rows="4"></textarea>

                        </div>
                        <div class="mt-3">
                        <label for="dieta">● Se possuir dieta anexar em formato pdf (arquivo único) </label>
                    </div>
                        <div class="mt-1">
                                <input class="form-control-file" id="dieta" autocomplete="dieta" name="dieta" type="file"  placeholder="Enter your first name" />
                        </div>

                        </div>
                                <div class="row">
                                    <div class="col-2"><br><br><br>
                                        <button class="btn btn-success btn-lg float-right"  stype="submit">Finalizar Consulta</button>
                                    </div>

                                </div>

                    </div>
                </form>


@endsection


