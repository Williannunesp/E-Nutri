@extends('layout')

@section('titulo')
    E-Nutri Professor
@endsection

@section('cabecalho')
    E-Nutri
@endsection

@section('tipopagina')
Se Necessário Atualize os Dados do Paciente
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
    <a class="nav-link" href="{{route('listaretorno')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
       Voltar
    </a>


    @endsection
              <form action="{{route('uppacienteret', ['id' => $agenda->id])}}" method="POST">
                @csrf
                    <div class="container">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="name" autocomplete="name" name="name" type="text" value="{{$agenda->paciente->name}}" required placeholder="Enter your first name" />
                                    <label for="name">Nome do Paciente: <b style="color: red">*</b></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="cpf" autocomplete="cpf" name="cpf" type="number" value="{{$agenda->paciente->cpf}}" required placeholder="Enter your first name" />
                                    <label for="cpf">CPF: <b style="color: red">*</b></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="profissao" name="profissao" value="{{$agenda->paciente->profissao}}" autocomplete="profissao" type="text"  required placeholder="Enter your first name" />
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
                                       :
                                       @php
                                       $seEh = $agenda->paciente->sexos_id == $sexos->id;
                                       $selecao = $seEh ? "selected = 'selected'" : '';

                                       @endphp
                                       <option value="{{$sexos->id}}" {{$selecao}}>{{$sexos->name}}</option>
                                       @endforeach


                                   </select>

                             </div>
                             <div class="col col-2">
                                <label for="ec" class=""> Estado Civil: <b style="color: red">*</b>
                                 <select name="ec" class="form-select " aria-label="Default select example">
                                 </label>


                                       @foreach ($ec as $ecs)
                                       :
                                       @php
                                       $seEh = $agenda->paciente->estci_id == $ecs->id;
                                       $selecao = $seEh ? "selected = 'selected'" : '';

                                       @endphp
                                       <option value="{{$ecs->id}}" {{$selecao}}>{{$ecs->name}}</option>
                                       @endforeach


                                   </select>

                             </div>
                            <div class="col-md-3 mt-1">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="datanasc" name="datanasc" autocomplete="datanasc" type="date" value="{{$agenda->paciente->datanasc}}" required placeholder="Enter your first name" />
                                    <label for="datanasc">Data de Nascimento: <b style="color: red">*</b></label>
                                </div>
                            </div>
                            <div class="col-md-3 mt-1">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="cel" name="cel" autocomplete="cel" type="number" value="{{$agenda->paciente->celular}}"  placeholder="Enter your first name" />
                                    <label for="cel">Celular: </label>
                                </div>
                            </div>
                            <div class="row mb-4 mt-4">
                                <div class="col-md-3 ">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="telres" name="telres" autocomplete="telres" type="number" value="{{$agenda->paciente->telres}}" placeholder="Enter your first name" />
                                        <label for="telres">Telefone Residencial: </label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="rua" autocomplete="rua" name="rua" type="text"  value="{{$agenda->paciente->rua}}" placeholder="Enter your first name" />
                                        <label for="rua">Rua: </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="numero" autocomplete="numero" name="numero" type="text"  value="{{$agenda->paciente->numero}}" placeholder="Enter your first name" />
                                        <label for="numero">Número: </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="bairro" autocomplete="bairro" name="bairro" type="text" value="{{$agenda->paciente->bairro}}"  placeholder="Enter your first name" />
                                        <label for="bairro">Bairro: </label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="rua" autocomplete="cidade" name="cidade" type="text"  value="{{$agenda->paciente->cidade}}" placeholder="Enter your first name" />
                                        <label for="cidade">Cidade: </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="uf" autocomplete="uf" name="uf" type="text" value="{{$agenda->paciente->uf}}"  placeholder="Enter your first name" />
                                        <label for="uf">UF: </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2" style="margin-top: 20px"><br><br><br>
                                <button class="btn btn-primary btn-lg float-right"  stype="submit">Continuar</button>
                            </div>

                            <div class="col-1"></div>
                        </form>

                    </div>

@endsection


