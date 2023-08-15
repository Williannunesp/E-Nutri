@extends('layout')

@section('titulo')
    Cadastro de usuários
@endsection

@section('cabecalho')
    Cadastro de Usuários
@endsection


@section('conteudo')
    
    @section('navbar')
    <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}"> <i class="fas fa-arrow-alt-circle-left"></i><span class="ttip">Inicio</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('showuser')}}"> <i class="fas fa-arrow-alt-circle-left"></i><span class="ttip">Voltar</span></a>
    </li>


    @endsection
              <form action="{{route('saveuser')}}" method="POST">
                @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col col-5">
                                <label for="nome">Nome <b style="color: red">*</b></label>
                                <input type="text" class="form-control mb-2" name="name" id="nome" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-5">
                                <label for="password">Senha <b style="color: red">*</b></label>
                                <input type="password" class="form-control mb-2" name="password" id="senha" required minlength="8">
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-2" style="margin-left: 130px">
                                <button class="btn btn-primary btn-lg float-right"  stype="submit">Cadastrar</button>
                            </div>
                            <div class="col-1"></div>
                </form>
                        </div>
                    </div>
                
@endsection


