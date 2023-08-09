@extends('layout')

@section('titulo')
Lista de usuarios
@endsection

@section('cabecalho')
Usuarios Cadastrados
@endsection
      
@section('conteudo')

@if(!empty($mensagem))

<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif
<a href="{{route('telacaduser')}}" class="btn btn-dark mb-2">Cadastrar</a>

<a href="{{route('index')}}" class="btn btn-dark mb-2 ">Inicio</a>

<ul class="list-group">
    @foreach ($users as $user)

        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $user->id }}  {{ $user->name }}  


        </li>
       
    @endforeach

</ul>
@endsection