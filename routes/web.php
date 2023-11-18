<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\AgendamentopcController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PrimeiraconsultaController;
use App\Http\Controllers\PrimeiracosnutaController;
use App\Http\Controllers\ProntuarioController;
use App\Http\Controllers\RetornoController;
use App\Models\Paciente;
use App\Models\Primeiraconsulta;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/reg', [AuthController::class, 'logadm']);
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/login', [AuthController::class, 'tlogin'])->name('tlogin');

Route::get('/home', [AuthController::class, 'home'])->name('home');

Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
Route::get('/signout', [AuthController::class, 'signout'])->name('signout');

Route::get('/user/show', [AuthController::class, 'show'])->name('showuser');
Route::get('/user/register', [AuthController::class, 'create'])->name('telacaduser');
Route::post('/user/register', [AuthController::class, 'store'])->name('saveuser');
Route::get('/user/edit/{id}', [AuthController::class, 'edit'])->name('telaedituser');
Route::post('/user/edit/{id}', [AuthController::class, 'update'])->name('edituser');
Route::post('/user/destoy/{id}', [AuthController::class, 'destroy'])->name('exluiruser');

Route::get('/agendapc/new', [AgendamentopcController::class, 'create'])->name('telacadagenda');
Route::get('/agendapc/list', [AgendamentopcController::class, 'gerenciar'])->name('buscaagenda');
Route::get('/agendapc/busc', [AgendamentopcController::class, 'selecionar'])->name('listaagenda');
Route::get('/agendapc/atendidos', [AgendamentopcController::class, 'atendidos'])->name('buscaatendidos');
Route::get('/agendapc/{id}', [AgendamentopcController::class, 'show'])->name('showagenda');
Route::post('/agendapc/store', [AgendamentopcController::class, 'store'])->name('saveagenda');
Route::get('/agendapc/edit/{id}', [AgendamentopcController::class, 'edit'])->name('telaeditagenda');
Route::post('/agendapc/edit/{id}', [AgendamentopcController::class, 'update'])->name('updateagenda');
Route::post('/agendapc/destoy/{id}', [AgendamentopcController::class, 'destroy'])->name('exluiragenda');

Route::get('/paciente/novo/{id}', [PacienteController::class, 'create'])->name('telacadpaciente');
Route::post('/paciente/novo/{id}', [PacienteController::class, 'store'])->name('criapaciente');
Route::post('/paciente/up/{id}', [PacienteController::class, 'update'])->name('editpaciente');
Route::get('/paciente/gerenciar', [PacienteController::class, 'show'])->name('gerenciarpaciente');
Route::post('/paciente/destoy/{id}', [PacienteController::class, 'destroy'])->name('exluirpaciente');
Route::get('/paciente/edit/{id}', [PacienteController::class, 'edit'])->name('telaeditpaciente');
Route::get('/paciente/view/{id}', [PacienteController::class, 'view'])->name('viewpaciente');

Route::get('/retorno/gerenciar', [RetornoController::class, 'gerenciar'])->name('gerenciarretorno');
Route::get('/retorno/busc', [RetornoController::class, 'selecionar'])->name('listaretorno');
Route::get('/retorno/atendidos', [RetornoController::class, 'atendidos'])->name('atendidoretorno');
Route::get('/retorno/selecionar', [RetornoController::class, 'paciente'])->name('selecionarretorno');
Route::get('/retorno/novo/{id}', [RetornoController::class, 'create'])->name('cadretorno');
Route::post('/retorno/novo', [RetornoController::class, 'store'])->name('saveretorno');
Route::get('/retorno/edit/{id}', [RetornoController::class, 'edit'])->name('editretorno');
Route::post('/retorno/edit/{id}', [RetornoController::class, 'update'])->name('updateretorno');
Route::post('/retorno/destoy/{id}', [RetornoController::class, 'destroy'])->name('exluirretorno');
Route::get('/retorno/show/{id}', [RetornoController::class, 'show'])->name('showretorno');
Route::get('/retorno/editpaci/{id}', [RetornoController::class, 'editpaci'])->name('editpaciretorno');
Route::post('/retorno/editpaci/{id}', [RetornoController::class, 'pacienteup'])->name('uppacienteret');
Route::post('/retorno/{id}', [RetornoController::class, 'storeconsulta'])->name('criaanexoret');

Route::post('/pc/{id}', [PrimeiraconsultaController::class, 'store'])->name('criaanexopc');

Route::get('/prontuario', [ProntuarioController::class, 'index'])->name('iniciopront');
Route::get('/prontuario/show/{id}', [ProntuarioController::class, 'show'])->name('showpront');
Route::get('/prontuario/showp/{id}', [ProntuarioController::class, 'edit'])->name('showprontpc');
