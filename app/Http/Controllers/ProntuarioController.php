<?php

namespace App\Http\Controllers;

use App\Models\Agendamentopc;
use App\Models\Paciente;
use App\Models\Retorno;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProntuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->name;
        $paciente = Paciente::query()->orderBy('name')->get();
        $acesso = User::where("name", $user)->get("acesso_id");
        if (Auth::check()){



        }
        if($acesso[0]->acesso_id == 1){
            return view('prontuarioprof.list', compact('paciente', 'user'));

        }else{
            return view('prontuarioalu.list', compact('paciente', 'user'));

        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $retorno = Retorno::where("paciente_id", $id )->Where("status_id", 2)->get();
        $user = Auth::user()->name;
        $paciente = Paciente::query()->orderBy('name')->get();
        $acesso = User::where("name", $user)->get("acesso_id");
        if (Auth::check()){
        if($acesso[0]->acesso_id == 1){
            return view('prontuarioprof.show', compact('retorno', 'user', 'id'));
        }else{
            return view('prontuarioalu.show', compact('retorno', 'user', 'id'));
        }
    }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pc = Agendamentopc::where("paciente_id", $id)->Where("status_id", 2)->get();
        $user = Auth::user()->name;
        $paciente = Paciente::query()->orderBy('name')->get();
        $acesso = User::where("name", $user)->get("acesso_id");
        if (Auth::check()){
        if($acesso[0]->acesso_id == 1){

            return view('prontuarioprof.showp', compact('pc', 'user', 'id'));

        }else{
            return view('prontuarioalu.showp', compact('pc', 'user', 'id'));
        }
    }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function openpdffichapc(String $id){
        $agenda = Agendamentopc::find($id);

        $pdfPath = storage_path('/app/public/' . $agenda->fichapc);
        return response()->file($pdfPath);
    }

    public function openpdfavpc(String $id){
        $agenda = Agendamentopc::find($id);

        $pdfPath = storage_path('/app/public/' . $agenda->antropometrica);
        return response()->file($pdfPath);
    }

    public function openpdfdietapc(String $id){
        $agenda = Agendamentopc::find($id);

        if($agenda->dieta == 0){
            return redirect('/prontuario/showp/' . $agenda->paciente_id)->with('erro', 'Este agendamento não possui dieta!');
       }else{
        $pdfPath = storage_path('/app/public/' . $agenda->dieta);
        return response()->file($pdfPath);
       }
    }

    public function openpdfavret(String $id){
        $agenda = Retorno::find($id);

        $pdfPath = storage_path('/app/public/' . $agenda->antropometrica);
        return response()->file($pdfPath);
    }

    public function openpdfficharet(String $id){
        $agenda = Retorno::find($id);

        $pdfPath = storage_path('/app/public/' . $agenda->ficharet);
        return response()->file($pdfPath);
    }

    public function openpdfdietaret(String $id){
        $agenda = Retorno::find($id);

        if($agenda->dieta == 0){
             return redirect('/prontuario/show/' . $agenda->paciente_id)->with('erro', 'Este agendamento não possui dieta!');
        }else{
        $pdfPath = storage_path('/app/public/' . $agenda->dieta);
        return response()->file($pdfPath);
        }
    }
}






