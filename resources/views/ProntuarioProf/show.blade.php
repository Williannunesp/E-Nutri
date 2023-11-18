@extends('layout')

@section('titulo')
E-Nutri Professor
@endsection

@section('cabecalho')
E-Nutri
@endsection
@section('tipopagina')
Prontuário Retornos
@endsection
@section('menuusuario')
        <li><a class="dropdown-item" href="#">{{$user}}</a></li>

        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="{{route('showuser')}}">Gerenciar Usuários</a></li>
        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="{{route('signout')}}">Sair</a></li>


@endsection
@section('navbar')


<div class="sb-sidenav-menu-heading">Voltar</div>
<a class="nav-link" href="{{route('iniciopront')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
   Voltar
</a>


@endsection

@section('conteudo')

@include('Menssagem/flash')

<div class="card-body">
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>Nome Completo</th>
                <th>Data Consulta</th>
                <th>Ficha Retorno</th>
                <th>Av Antropométrica</th>
                <th>Dieta</th>
                <th>Usuário</th>

            </tr>
        </thead>

        <tbody>
            @foreach ($retorno as $retornos)






            <tr>

                <td>{{ $retornos->name }}</td>
                <td>{{ \Carbon\Carbon::parse($retornos->data)->format('d/m/Y')}}</td>
                <td><a href="{{route('showpront', ['id' => $retornos->id])}}">
                    <button class="btn btn-primary" style="display: flex" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                          </svg>
                        </button></a>
                </td>
                <td><a href="{{route('showpront', ['id' => $retornos->id])}}">
                    <button class="btn btn-primary" style="display: flex" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                          </svg>
                        </button></a>
                </td>
                <td><a href="{{route('showpront', ['id' => $retornos->id])}}">
                    <button class="btn btn-primary" style="display: flex" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                          </svg>
                        </button></a>
                </td>
                <td>{{ $retornos->username }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> <br> <br><br>


            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">PRONTUÁRIO</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{route('showprontpc', ['id' => $id])}}">Primeira Consulta</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

            @endsection



{{-- <div class="card-body">
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>Nome Completo</th>
                <th>Data Consulta</th>
                <th>Ficha Consulta</th>
                <th>Avaliação Antropométrica</th>
                <th>Dieta</th>
                <th>Usuário</th>




            </tr>
        </thead>

        <tbody>
            @foreach ($retorno as $retornos)




            <tr>

                <td>{{ $retornos->name }}</td>
                <td>>{{ $retornos->data }}</td>
                <td><a href="#">
                    <button class="btn btn-primary" style="display: flex" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                          </svg>
                        </button></a>
                </td>
                <td>
                    <td><a href="#">
                        <button class="btn btn-primary" style="display: flex" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                              </svg>
                            </button></a>
                    </td>
                    <td>
                        <td><a href="#">
                            <button class="btn btn-primary" style="display: flex" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                  </svg>
                                </button></a>
                        </td>
                <td>>{{ $retornos->username }}</td>

            </tr>
            @endforeach


        </tbody>
    </table>
</div>




@endsection --}}
