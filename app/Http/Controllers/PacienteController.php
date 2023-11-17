<?php

namespace App\Http\Controllers;

use App\Models\Agendamentopc;
use App\Models\Estadocivil;
use App\Models\Paciente;
use App\Models\Sexo;
use App\Models\User;
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

            $user = Auth::user()->name;
            $acesso = User::where("name", $user)->get("acesso_id");
            $sexo = Sexo::all();
            $ec = Estadocivil::all();
            $dadospaci = Paciente::find($id);

            if($acesso[0]->acesso_id == 1){
                return view('pacienteprof.create', ['sexo'=>$sexo, 'ec'=>$ec, 'dadospaci'=>$dadospaci, 'user'=>$user]);
            }else{
                return view('pacientealu.create', ['sexo'=>$sexo, 'ec'=>$ec, 'dadospaci'=>$dadospaci, 'user'=>$user]);

            }






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
    public function show()
    {
        if (Auth::check()){//verifica se possui usuário logado.

            $user = Auth::user()->name;//busca nome usuário.
            $acesso = User::where("name", $user)->get("acesso_id");//busca id tipo de acesso.
            $pacientes = Paciente::query()->orderBy('name')->get();//busca todos usuários cadastrados no banco.

        if($acesso[0]->acesso_id == 1){//verifica se é aluno ou professor.



            return view('pacienteprof.gere', compact('pacientes', 'user'));//tela mostrar login com busca no banco.

        }else{

            return view('pacientealu.gere', compact('pacientes', 'user'));//tela mostrar login com busca no banco.        }
        }
        }else{

        return redirect('home');//chama endereço home.
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::check()){//verifica se possui usuário logado.

            $user = Auth::user()->name;//busca nome usuário.
            $acesso = User::where("name", $user)->get("acesso_id");//busca id tipo de acesso.
            $dadospaci = Paciente::find($id);//busca todos usuários cadastrados no banco.
            $sexo = Sexo::all();
            $ec = Estadocivil::all();

        if($acesso[0]->acesso_id == 1){//verifica se é aluno ou professor.

            return view('pacienteprof.edit', compact('dadospaci', 'user', 'sexo', 'ec'));//tela mostrar login com busca no banco.

        }else{

            return view('pacientealu.edit', compact('dadospaci', 'user', 'sexo', 'ec'));//tela mostrar login com busca no banco.        }
        }
        }else{

        return redirect('home');//chama endereço home.
        }
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

        return redirect('/paciente/gerenciar')->with('sucesso', 'Paciente Alterado com Sucesso!');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user()->name;//busca nome usuário.
        $acesso = User::where("name", $user)->get("acesso_id");

    if($acesso[0]->acesso_id == 1){
        Paciente::destroy($id);

        return redirect("/paciente/gerenciar")->with('erro', 'Paciente excluido com sucesso!');
    }else{
        return redirect('home');
    }
    }
}
