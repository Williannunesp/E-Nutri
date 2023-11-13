@extends('layout')

@section('titulo')
    Cadastro de Paciente
@endsection

@section('cabecalho')
    Cadastro de Paciente
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
              <form action="{{route('editpaciente', ['id' => $dadospaci->id])}}" method="POST">
                @csrf
                    <div class="container">
                            <div class="row">
                            <div class="col col-5">
                                <label for="nome">Nome do Paciente: <b style="color: red">*</b></label>
                                <input type="text" class="form-control mb-2" autocomplete="name" name="name" id="nome" value="{{$dadospaci->name}}" required>
                            </div>
                            <div class="col col-5">
                                <label for="data">CPF: <b style="color: red">*</b></label>
                                <input type="number" autocomplete="cpf" class="form-control mb-2" name="cpf" id="cpf"  required>
                            </div>

                            <div class="col col-4 mt-4 ">
                                <label for="sexo" class=""> Sexo ao Nascer: <b style="color: red">*</b>
                                 <select name="sexo" class="form-select " aria-label="Default select example">
                                 </label>
                                     
                                       
                                       @foreach ($sexo as $sexos)
                                       <option value="{{$sexos->id}}" >{{$sexos->name}}</option>
                                       @endforeach
                                      
                                    
                                   </select>
                                   
                             </div> 

                             <div class="col col-4 mt-4 ">
                                <label for="ec" class=""> Estado Civil: <b style="color: red">*</b>
                                 <select name="ec" class="form-select " aria-label="Default select example">
                                 </label>
                                     
                                       
                                       @foreach ($ec as $ecs)
                                       <option value="{{$ecs->id}}" >{{$ecs->name}}</option>
                                       @endforeach
                                      
                                    
                                   </select>
                                   
                             </div> 

                            <div class="col col-5">
                                <label for="datanasc">Data de Nascimento: <b style="color: red">*</b></label>
                                <input type="date"  class="form-control mb-2" name="datanasc" id="datanasc"  required>
                            </div>

                            <div class="col col-3">
                                <label for="profissao">Profissão: <b style="color: red">*</b></label>
                                <input type="text"  class="form-control mb-2" name="profissao" id="profissao"  required>
                            </div>


                            
                                
                           
                            <div class="col col-3">
                                <label for="cel">Celular: </label>
                                <input type=" number" placeholder="Somente Números" autocomplete="tel"  class="form-control mb-2" value="{{$dadospaci->celular}}" name="cel" id="cel" >
                            </div>
                        
                            <div class="col col-3">
                                <label for="telres">Telefone Residencial: </label>
                                <input type="number" placeholder="Somente Números" class="form-control mb-2" name="telres" id="telres" >
                            </div>
                          
                            <div class="col col-5">
                                <label for="rua">Rua: </label>
                                <input type="text"  class="form-control mb-2" name="rua" id="rua" >
                            </div>

                            <div class="col col-1">
                                <label for="numero">Número: </label>
                                <input type="text"  class="form-control mb-2" name="numero" id="numero" >
                            </div>
                            
                            <div class="col col-3">
                                <label for="bairro">Bairro: </label>
                                <input type="text"  class="form-control mb-2" name="bairro" id="bairro" >
                            </div>
                        
                            
                            <div class="col col-3">
                                <label for="cidade">Cidade: </label>
                                <input type="text"  class="form-control mb-2" name="cidade" id="cidade" >
                            </div>

                            <div class="col col-1">
                                <label for="uf">UF: </label>
                                <input type="text"  class="form-control mb-2" name="uf" id="uf" >
                            </div>
                        </div>
                               
                            <div class="col-2" style="margin-top: 20px"><br><br><br>
                                <button class="btn btn-primary btn-lg float-right"  stype="submit">Prosseguir</button>
                            </div>
                        
                            <div class="col-1"></div>
                </form>
                        </div>
                    </div>
                
@endsection


