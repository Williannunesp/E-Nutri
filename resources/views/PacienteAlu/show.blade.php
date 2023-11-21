@extends('layout')

@section('titulo')
    E-Nutri Aluno
@endsection

@section('cabecalho')
    E-Nutri
@endsection

@section('tipopagina')
Ver Dados Paciente
@endsection
@section('menuusuario')
        <li><a class="dropdown-item" href="#">{{$user}}</a></li>
        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="{{route('signout')}}">Sair</a></li>

@endsection

@section('conteudo')

    @section('navbar')
    <div class="sb-sidenav-menu-heading">Paciente</div>
    <a class="nav-link" href="{{route('telaeditpaciente', ['id' => $dadospaci->id])}}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
       Editar Paciente
    </a>
    <div class="sb-sidenav-menu-heading">Voltar</div>
    <a class="nav-link" href="{{route('home')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
       Voltar
    </a>


    @endsection

                    <div class="container">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="name" autocomplete="name" name="name" type="text" value="{{$dadospaci->name}}" disabled required placeholder="Enter your first name" />
                                    <label for="name">Nome do Paciente: <b style="color: red">*</b></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="cpf" autocomplete="cpf" name="cpf" type="number" value="{{$dadospaci->cpf}}" disabled required placeholder="Enter your first name" />
                                    <label for="cpf">CPF: <b style="color: red">*</b></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="profissao" name="profissao" value="{{$dadospaci->profissao}}" autocomplete="profissao" disabled type="text"  required placeholder="Enter your first name" />
                                    <label for="profissao">Profissão: <b style="color: red">*</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col col-2 ">
                                <label for="sexo" class=""> Sexo ao Nascer: <b style="color: red">*</b>
                                 <select name="sexo" class="form-select " disabled aria-label="Default select example">
                                 </label>



                                 @foreach ($sexo as $sexos)
                                 :
                                 @php
                                 $seEh = $agenda->paciente->sexo_id == $sexos->id;
                                 $selecao = $seEh ? "selected = 'selected'" : '';

                                 @endphp
                                 <option value="{{$sexos->id}}" {{$selecao}}>{{$sexos->name}}</option>
                                 @endforeach


                                   </select>

                             </div>
                             <div class="col col-2">
                                <label for="ec" class=""> Estado Civil: <b style="color: red">*</b>
                                 <select name="ec" class="form-select " disabled aria-label="Default select example">
                                 </label>


                                       @foreach ($ec as $ecs)
                                       :
                                       @php
                                       $seEh = $dadospaci->estci_id == $ecs->id;
                                       $selecao = $seEh ? "selected = 'selected'" : '';

                                       @endphp
                                       <option value="{{$ecs->id}}" {{$selecao}}>{{$ecs->name}}</option>
                                       @endforeach


                                   </select>

                             </div>
                            <div class="col-md-3 mt-1">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="datanasc" disabled name="datanasc" autocomplete="datanasc" type="date" value="{{$dadospaci->datanasc}}" required placeholder="Enter your first name" />
                                    <label for="datanasc">Data de Nascimento: <b style="color: red">*</b></label>
                                </div>
                            </div>
                            <div class="col-md-3 mt-1">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="cel" disabled name="cel" autocomplete="cel" type="number" value="{{$dadospaci->celular}}"  placeholder="Enter your first name" />
                                    <label for="cel">Celular: </label>
                                </div>
                            </div>
                            <div class="row mb-4 mt-4">
                                <div class="col-md-3 ">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="telres" disabled name="telres" autocomplete="telres" type="number" value="{{$dadospaci->telres}}" placeholder="Enter your first name" />
                                        <label for="telres">Telefone Residencial: </label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="rua" disabled autocomplete="rua" name="rua" type="text"  value="{{$dadospaci->rua}}" placeholder="Enter your first name" />
                                        <label for="rua">Rua: </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="numero" disabled autocomplete="numero" name="numero" type="text"  value="{{$dadospaci->numero}}" placeholder="Enter your first name" />
                                        <label for="numero">Número: </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="bairro" disabled autocomplete="bairro" name="bairro" type="text" value="{{$dadospaci->bairro}}"  placeholder="Enter your first name" />
                                        <label for="bairro">Bairro: </label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="rua" disabled autocomplete="cidade" name="cidade" type="text"  value="{{$dadospaci->cidade}}" placeholder="Enter your first name" />
                                        <label for="cidade">Cidade: </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="uf" disabled autocomplete="uf" name="uf" type="text" value="{{$dadospaci->uf}}"  placeholder="Enter your first name" />
                                        <label for="uf">UF: </label>
                                    </div>
                                </div>
                            </div>




                    </div>

@endsection


