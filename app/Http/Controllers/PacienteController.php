<?php

namespace App\Http\Controllers;

use App\Models\Agendamentopc;
use App\Models\Estadocivil;
use App\Models\Paciente;
use App\Models\Sexo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        if(Auth::check()){//verifica se possui usuário logado.

            $sexo = Sexo::all();
            $ec = Estadocivil::all();
            $pacienteid = Agendamentopc::where("id", $id)->get("paciente_id");
            $dadospaci = Paciente::find($pacienteid[0]->paciente_id);




            return view('paciente.create', ['sexo'=>$sexo, 'ec'=>$ec, 'dadospaci'=>$dadospaci]);


        }else{

            return redirect('login')->with('erro1', 'Efetue o login para continuar!');//tela login com erro.

        }

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $paciente = Paciente::find($id);


        $paciente->update([
            "name" => $request->name,
            "cpf" => $request->cpf,
            "datanasc" => $request->datanasc,
            "email" => $request->email,
            "profissao" => $request->profissao,
            "celular" => $request->cel,
            "telres" => $request->telres,
            "rua" => $request->rua,
            "numero" => $request->numero,
            "bairro" => $request->bairro,
            "cidade" => $request->cidade,
            "uf" => $request->uf,
            "estci_id" => $request->ec,
            "sexo_id" => $request->sexo,


        ]);

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
