@extends('layout')

@section('titulo')
    E-Nutri Aluno
@endsection

@section('cabecalho')
    E-Nutri
@endsection

@section('tipopagina')
Cadastro de Pacientes
@endsection
@section('menuusuario')
        <li><a class="dropdown-item" href="#">{{$user}}</a></li>
        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="{{route('signout')}}">Sair</a></li>

@endsection

@section('conteudo')

    @section('navbar')
    <div class="sb-sidenav-menu-heading">Voltar</div>
    <a class="nav-link" href="{{route('listaagenda')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
       Voltar
    </a>


    @endsection
              <form action="{{route('editpaciente', ['id' => $dadospaci->id])}}" method="POST">
                @csrf
                    <div class="container">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="name" autocomplete="name" name="name" type="text" value="{{$dadospaci->name}}" required placeholder="Enter your first name" />
                                    <label for="name">Nome do Paciente: <b style="color: red">*</b></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="cpf" autocomplete="cpf" name="cpf" type="number" required placeholder="Enter your first name" />
                                    <label for="cpf">CPF: <b style="color: red">*</b></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="profissao" name="profissao" autocomplete="profissao" type="text"  required placeholder="Enter your first name" />
                                    <label for="profissao">Profissão: <b style="color: red">*</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col col-2 ">
                                <label for="sexo" class=""> Sexo ao Nascer: <b style="color: red">*</b>
                                 <select name="sexo" class="form-select " aria-label="Default select example">
                                 </label>


                                       @foreach ($sexo as $sexos)
                                       <option value="{{$sexos->id}}" >{{$sexos->name}}</option>
                                       @endforeach


                                   </select>

                             </div>
                             <div class="col col-2">
                                <label for="ec" class=""> Estado Civil: <b style="color: red">*</b>
                                 <select name="ec" class="form-select " aria-label="Default select example">
                                 </label>


                                       @foreach ($ec as $ecs)
                                       <option value="{{$ecs->id}}" >{{$ecs->name}}</option>
                                       @endforeach


                                   </select>

                             </div>
                            <div class="col-md-3 mt-1">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="data" name="data" autocomplete="data" type="date" required placeholder="Enter your first name" />
                                    <label for="data">Data de Nascimento: <b style="color: red">*</b></label>
                                </div>
                            </div>
                            <div class="col-md-3 mt-1">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="cel" name="cel" autocomplete="cel" type="number" value="{{$dadospaci->celular}}" required placeholder="Enter your first name" />
                                    <label for="cel">Celular: </label>
                                </div>
                            </div>
                            <div class="row mb-4 mt-4">
                                <div class="col-md-3 ">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="telres" name="telres" autocomplete="telres" type="number" required placeholder="Enter your first name" />
                                        <label for="telres">Telefone Residencial: </label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="rua" autocomplete="rua" name="rua" type="text"  required placeholder="Enter your first name" />
                                        <label for="rua">Rua: </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="numero" autocomplete="numero" name="numero" type="text"  required placeholder="Enter your first name" />
                                        <label for="numero">Número: </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="bairro" autocomplete="bairro" name="bairro" type="text"  required placeholder="Enter your first name" />
                                        <label for="bairro">Bairro: </label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="rua" autocomplete="cidade" name="cidade" type="text"  required placeholder="Enter your first name" />
                                        <label for="cidade">Cidade: </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="uf" autocomplete="uf" name="uf" type="text"  required placeholder="Enter your first name" />
                                        <label for="uf">UF: </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2" style="margin-top: 20px"><br><br><br>
                                <button class="btn btn-primary btn-lg float-right"  stype="submit">Prosseguir</button>
                            </div>

                            <div class="col-1"></div>
                        </form>

                    </div>

@endsection


