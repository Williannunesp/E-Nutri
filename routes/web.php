<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\AgendamentopcController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PacienteController;
use App\Models\Paciente;
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
// Route::get('/reg', [AuthController::class, 'logadm']);
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
Route::get('/agendapc/list', [AgendamentopcController::class, 'list'])->name('buscaagenda');
Route::get('/agendapc/busc', [AgendamentopcController::class, 'selecionar'])->name('listaagenda');
Route::get('/agendapc/{id}', [AgendamentopcController::class, 'show'])->name('showagenda');
Route::post('/agendapc/store', [AgendamentopcController::class, 'store'])->name('saveagenda');
Route::get('/agendapc/edit/{id}', [AgendamentopcController::class, 'edit'])->name('telaeditagenda');
Route::post('/agendapc/edit/{id}', [AgendamentopcController::class, 'update'])->name('updateagenda');

Route::get('/paciente/novo/{id}', [PacienteController::class, 'create'])->name('telacadpaciente');
Route::post('/paciente/up/{id}', [PacienteController::class, 'update'])->name('editpaciente');
