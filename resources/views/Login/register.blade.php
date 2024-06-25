@extends('layout')

@section('titulo')
E-Nutri Professor
@endsection

@section('cabecalho')
    E-Nutri
@endsection
@section('menuusuario')
        <li><a class="dropdown-item" href="#">{{$user}}</a></li>

        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="{{route('showuser')}}">Gerenciar Usuários</a></li>
        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="{{route('signout')}}">Sair</a></li>

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
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="namec" autocomplete="namec" name="namec" type="text" required placeholder="Enter your first name" />
                                    <label for="namec">Nome Completo: <b style="color: red">*</b></label>
                                </div>
                             </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="rm" autocomplete="rm" name="rm" type="number" required placeholder="Enter your first name" />
                                        <label for="rm">RM: <b style="color: red">*</b></label>
                                    </div>
                                </div>
                               <div class="col-md-3">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="tel" name="tel" autocomplete="tel" type="number" placeholder="Enter your first name" />
                                        <label for="tel">Telefone: </label>
                                    </div>
                             </div>
                            </div>
                        <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="nameu" autocomplete="" name="nameu" type="text" required placeholder="Enter your first name" />
                                        <label for="nameu">Nome do Usuário: <b style="color: red">*</b></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="password" autocomplete="" name="password" required minlength="8" type="password" required placeholder="Enter your first name" />
                                        <label for="password">Senha: <b style="color: red">*</b></label>
                                    </div>
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
                                 <div class="row mb-4">
                            <div class="col-2" style="margin-left: 70px"><br><br><br>
                                <button class="btn btn-success btn-lg float-right"  stype="submit">Cadastrar</button>
                            </div>
                            </div>
                            </form>
                        </div>
                    </div>

@endsection


