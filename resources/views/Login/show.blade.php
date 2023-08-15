@extends('layout')

@section('titulo')
Lista de usuarios
@endsection

@section('cabecalho')
Usuarios Cadastrados
@endsection
      
@section('conteudo')

{{-- @if(!empty($mensagem))

<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif --}}
@include('Menssagem/flash')

@section('navbar')

<li class="nav-item">
    <a class="nav-link" href="{{route('home')}}"> <i class="fas fa-arrow-alt-circle-left"></i><span class="ttip">Inicio</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{route('telacaduser')}}"> <i class="	fa fa-plus-square"></i><span class="ttip">Cadastrar Usuário</span></a>
</li>
    
@endsection
<ul class="list-group">
    @foreach ($users as $user)
    <div class="col-6">
        <li class="list-group-item d-flex justify-content-between align-items-center mt-2">
            {{ $user->id }}  {{ $user->name }}  


        </li>
    </div>
    @endforeach

</ul>
@endsection