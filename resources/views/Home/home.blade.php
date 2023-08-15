@extends('layout')

@section('titulo')
    Tela Inciial    
@endsection

@section('cabecalho')
    
@endsection


@section('conteudo')
        @section('navbar')
        <li class="nav-item">
            <a class="nav-link" href="{{route('showuser')}}"> <i class="fa fa-user"></i><span class="ttip">Usuários</span></a>
        </li>
        @endsection
@endsection