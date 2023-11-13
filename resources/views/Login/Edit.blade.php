@extends('layout')

@section('titulo')
    E-Nutri Professor
@endsection

@section('cabecalho')
    E-Nutri
@endsection

@section('tipopagina')
Editar Usuário
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
    <a class="nav-link" href="{{route('showuser')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
       Voltar
    </a>


    @endsection
              <form action="{{route('edituser', ['id' => $users->id])}}" method="POST">
                @csrf
                    <div class="container">
                        <div class="row">



                            <div class="col col-5">
                                <label for="nome">Nome Completo: <b style="color: red">*</b></label>
                                <input type="text" class="form-control mb-2" name="namec" id="nome" value="{{$users->namecomp}}"  required>
                            </div>
                            <div class="col col-5">
                                <label for="nome">RM: <b style="color: red">*</b></label>
                                <input type="number" class="form-control mb-2" name="rm" id="nome" value="{{$users->rm}}" required>
                            </div>
                            <div class="col col-5">
                                <label for="nome">Telefone: </label>
                                <input type="number" class="form-control mb-2" name="tel" value="{{$users->telefone}}" id="nome" >
                            </div>

                            <div class="col col-5">
                                <label for="nome">Nome de Usuario: <b style="color: red">*</b></label>
                                <input type="text" class="form-control mb-2" name="nameu" id="nome"  value="{{$users->name}}" required>
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


                                       @foreach ($status as $statu)
                                       :
                                       @php
                                       $seEh = $users->status_id == $statu->id;
                                       $selecao = $seEh ? "selected = 'selected'" : '';

                                       @endphp
                                       <option value="{{$statu->id}}" {{$selecao}}>{{$statu->name}}</option>
                                       @endforeach


                                   </select>

                                </div>

                             {{-- <div class="row"> --}}
                                <div class="col col-4 mt-4 ">
                                    <label for="acesso" class=""> Tipo de Acesso <b style="color: red">*</b>
                                     <select name="acesso" class="form-select " aria-label="Default select example">
                                     </label>

                                         
                                           @foreach ($acesso as $acessos)
                                           :
                                           @php
                                           $seEh = $users->acesso_id == $acessos->id;
                                           $selecao = $seEh ? "selected = 'selected'" : '';

                                           @endphp
                                           <option value="{{$acessos->id}}" {{$selecao}}>{{$acessos->name}}</option>
                                           @endforeach


                                       </select>

                            <div class="col-2" style="margin-left: 70px"><br><br><br>
                                <button class="btn btn-primary btn-lg float-right"  stype="submit">Alterar</button>
                            </div>
                            <div class="col-1"></div>
                </form>
                        </div>
                    </div>

@endsection


