@extends('layout')

@section('titulo')
E-Nutri
@endsection

@section('cabecalho')
    E-Nutri
@endsection
@section('tipopagina')
Cadastro de Usuários
@endsection

@section('conteudo')

    @section('navbar')
    <div class="sb-sidenav-menu-heading">Voltar</div>
    <a class="nav-link" href="{{route('showuser')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
       Voltar
    </a>


    @endsection
              <form action="{{route('saveuser')}}" method="POST">
                @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col col-5">
                                <label for="nome">Nome Completo: <b style="color: red">*</b></label>
                                <input type="text" class="form-control mb-2" autocomplete="name" name="namec" id="nome"  required>
                            </div>
                            <div class="col col-5">
                                <label for="nome">RM: <b style="color: red">*</b></label>
                                <input type="number" class="form-control mb-2" name="rm" id="nome"   required>
                            </div>
                            <div class="col col-5">
                                <label for="nome">Telefone: </label>
                                <input type=" number" autocomplete="tel"  class="form-control mb-2" name="tel" id="nome" >
                            </div>
                            <div class="col col-5">
                                <label for="nome">Nome de Usuario: <b style="color: red">*</b></label>
                                <input type="text" autocomplete="login" class="form-control mb-2" name="nameu" id="nome"  required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-5">
                                <label for="password">Senha <b style="color: red">*</b></label>
                                <input type="password" class="form-control mb-2" name="password" id="senha" required minlength="8">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-4 mt-4">
                                <label for="status" class=""> Status <b style="color: red">*</b>
                                 <select name="status" class="form-select " aria-label="Default select example">
                                 </label>

                                       {{-- <option value="" ></option> --}}
                                       @foreach ($status as $statu)
                                       <option value="{{$statu->id}}" >{{$statu->name}}</option>
                                       @endforeach


                                   </select>

                                </div>

                             {{-- <div class="row"> --}}
                                <div class="col col-4 mt-4 ">
                                    <label for="acesso" class=""> Tipo de Acesso <b style="color: red">*</b>
                                     <select name="acesso" class="form-select " aria-label="Default select example">
                                     </label>


                                           @foreach ($acesso as $acessos)
                                           <option value="{{$acessos->id}}" >{{$acessos->name}}</option>
                                           @endforeach


                                       </select>

                                 </div>

                            <div class="col-2" style="margin-left: 70px"><br><br><br>
                                <button class="btn btn-success btn-lg float-right"  stype="submit">Cadastrar</button>
                            </div>
                            <div class="col-1"></div>
                </form>
                        </div>
                    </div>

@endsection


