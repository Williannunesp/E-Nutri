@extends('layout')

@section('titulo')
    Cadastro de usuários
@endsection

@section('cabecalho')
    Cadastro de Usuários
@endsection


@section('conteudo')
    
              <form action="{{route('saveuser')}}" method="POST">
                @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col col-6">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control mb-2" name="name" id="nome" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <label for="password">Senha:</label>
                                <input type="password" class="form-control mb-2" name="password" id="senha" required minlength="8">
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-2">
                                <button class="btn btn-primary btn-lg float-right" type="submit">Cadastrar</button>
                            </div>
                            <div class="col-1"></div>
                </form>
                            <div class="col-3">
                                <a class="btn btn-danger btn-lg float-right" href="{{route('index')}}">Voltar</a>
                            </div>
                        </div>
                    </div>
                
@endsection


