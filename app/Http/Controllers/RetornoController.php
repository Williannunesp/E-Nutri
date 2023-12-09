<?php

namespace App\Http\Controllers;

use App\Models\Estadocivil;
use App\Models\Paciente;
use App\Models\Retorno;
use App\Models\Sexo;
use App\Models\StatusConsulta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetornoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        if (Auth::check()){//verifica se possui usuário logado.
            $user = Auth::user()->name;//busca nome usuário.
            $acesso = User::where("name", $user)->get("acesso_id");//busca id tipo de acesso.
            $pacientes = Paciente::find($id);
            $statu = StatusConsulta::where('id', 1)->get('name');

            if($acesso[0]->acesso_id == 1){
                return view('Agendamentoretprof.create', compact('user', 'pacientes', 'statu'));
            }else{
                return view('Agendamentoretalu.create', compact('user', 'pacientes', 'statu'));
            }

        }else{

            return redirect('home');//chama endereço home.

        }

    }
    public function paciente(){
        if (Auth::check()){//verifica se possui usuário logado.

            $user = Auth::user()->name;//busca nome usuário.
            $acesso = User::where("name", $user)->get("acesso_id");//busca id tipo de acesso.
            $pacientes = Paciente::query()->orderBy('name')->get();

            if($acesso[0]->acesso_id == 1){


                return view('Agendamentoretprof.select', compact('user', 'pacientes'));
            }else{
                return view('Agendamentoretalu.select', compact('user', 'pacientes'));
            }

        }else{

            return redirect('home');//chama endereço home.

        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pacienteid = Paciente::where("name", $request->name)->get("id");

        $user = Auth::user()->name;
        foreach ($pacienteid as $pacienteids) {
            Retorno::create([//salva no banco um agendamento de consulta.

                "name" => $request->name,
                "telefone" => $request->tel,
                "data" => $request->data,
                "hora" => $request->hora,
                "paciente_id" => $pacienteids->id,
                "username" => $user,
                "status_id" => 1

            ]);
        }

        return redirect("/retorno/gerenciar")->with('sucesso', 'Paciente Agendado com sucesso');
    }

    public function gerenciar(){
        if (Auth::check()){//verifica se possui usuário logado.

            $user = Auth::user()->name;//busca nome usuário.
            $acesso = User::where("name", $user)->get("acesso_id");//busca id tipo de acesso.
            $agendamentoret = Retorno::where('status_id', 1)->orderBy('data')->get();//busca todos agendamentos cadastrados no banco.

            if($acesso[0]->acesso_id == 1){//verifica se é aluno ou professor.

                // $data = implode("/", array_reverse(explode("-",$agendamentopc[0]->data)));

                return view('AgendamentoretProf.geren',['agendamentoret'=>$agendamentoret, 'user'=>$user]);//tela mostrar login com busca no banco.

            }else{

                return view('AgendamentoretAlu.geren',['agendamentoret'=>$agendamentoret, 'user'=>$user]);
            }
        }else{

            return redirect('home');//chama endereço home.

        }
    }

    public function selecionar(){
        if (Auth::check()){

            $user = Auth::user()->name;
            $acesso = User::where("name", $user)->get("acesso_id");//busca id tipo de acesso.


            $agendamentoret = Retorno::where('status_id', 1)->orderBy('data')->get();

            if($acesso[0]->acesso_id == 1){
                return view('agendamentoretprof.list', ['agendamentoret'=>$agendamentoret, 'user'=>$user]);
            }else{
                return view('agendamentoretalu.list', ['agendamentoret'=>$agendamentoret, 'user'=>$user]);
            }



        }else{

            return redirect('home');//chama endereço home.

        }

    }
    public function editpaci($id){
        if (Auth::check()){//verifica se possui usuário logado.

            $user = Auth::user()->name;//busca nome usuário.
            $acesso = User::where("name", $user)->get("acesso_id");//busca id tipo de acesso.
            $agenda = Retorno::find($id);//busca todos usuários cadastrados no banco.
            $sexo = Sexo::all();
            $ec = Estadocivil::all();

        if($acesso[0]->acesso_id == 1){//verifica se é aluno ou professor.




            return view('Agendamentoretprof.paci', compact('agenda', 'user', 'sexo', 'ec'));//tela mostrar login com busca no banco.

        }else{

            return view('Agendamentoretalu.paci', compact('agenda', 'user', 'sexo', 'ec'));//tela mostrar login com busca no banco.        }
        }
        }else{

        return redirect('home');//chama endereço home.
        }
    }
    public function pacienteup(Request $request, string $id){
        $agenda = Retorno::find($id);




        $agenda->paciente->update([
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

        $agenda->update([
            "name" => $request->name,
            "telefone" => $request->cel,
        ]);

        $user = Auth::user()->name;//busca nome usuário.
        $acesso = User::where("name", $user)->get("acesso_id");//busca id tipo de acesso.
        if($acesso[0]->acesso_id == 1){
            return view('retornoprof.create', compact('agenda', 'user') );
        }else{
            return view('retornoalu.create', compact('agenda', 'user') );
        }
    }
    public function show(string $id)
    {
        if(Auth::check()){//verifica se possui usuário logado.

            $agenda = Retorno::find($id);//busca qual agendamento vai para edição.
            $statu = StatusConsulta::where('id', 1)->get('name');//busca por status de não atendido como padrão.
            $user = Auth::user()->name;//busca nome usuário.
            $acesso = User::where("name", $user)->get("acesso_id");//busca id tipo de acesso.


            if($acesso[0]->acesso_id == 1){
                return view('agendamentoretprof.show', ['agenda'=>$agenda, 'statu'=>$statu, 'user'=>$user]);//tela edição de agendamento com informações.
            }else{
                return view('agendamentoretalu.show', ['agenda'=>$agenda, 'statu'=>$statu, 'user'=>$user]);//tela edição de agendamento com informações.

            }




        }else{

            return redirect('login')->with('erro1', 'Efetue o login para continuar!');//tela login com erro.

        }
    }
    public function atendidos(){
        if (Auth::check()){//verifica se possui usuário logado.
        $user = Auth::user()->name;//busca nome usuário.
        $acesso = User::where("name", $user)->get("acesso_id");//busca id tipo de acesso.
        $agendamentoret = Retorno::where('status_id', 2)->orderBy('data')->get();//busca todos agendamentos cadastrados no banco.

        if($acesso[0]->acesso_id == 1){
            return view('Agendamentoretprof.atend',['agendamentoret'=>$agendamentoret, 'user'=>$user]);
        }else{
            return view('Agendamentoretalu.atend',['agendamentoret'=>$agendamentoret, 'user'=>$user]);
        }
    }else{
        return redirect('home');//chama endereço home.
    }
    }

    public function storeconsulta(Request $request, $id){
        $user = Auth::user()->name;



        $agenda = Retorno::find($id);


        if($request->ficharet){
            $extensionret = $request->ficharet->extension();
            if($extensionret == 'pdf'){
            // $ficharetname = $agenda->name . "_Primeira_Consulta" . now() . "." . $extensionret;

            $cret = $request->ficharet->store('retorno');
            }else{
                return null;
            }


            }if($request->fichaav){
                $extensionav = $request->fichaav->extension();
                if($extensionav == 'pdf'){
                // $fichaavname = $agenda->name . "_Avaliação_Antropometrica" . now() . "." . $extensionav;

                $cav = $request->file('fichaav')->store('retav_antropometrica');
                }else{
                    return null;
                }

        }
        if($request->dieta){
            $extensiondie = $request->dieta->extension();
            if($extensiondie == 'pdf'){
            $cdie = $request->file('dieta')->store('retdieta');
            }else{
                return null;
            }

        }else{
            $cdie = 0;
        }
         

        $agenda->update([
            'descriçãoficharet' => $request->descret,
            'ficharet' => $cret,
            'descriçãoantro' => $request->descav,
            'antropometrica' => $cav,
            'descriçãodieta' => $request->descdie,
            'dieta' => $cdie,
            'status_id' => 2,
            'username' => $user,
        ]);


        return redirect('home')->with('sucesso', 'Consulta Finalizada');
    }
    public function edit(string $id)
    {
        if(Auth::check()){//verifica se possui usuário logado.

            $user = Auth::user()->name;//busca nome usuário.
            $acesso = User::where("name", $user)->get("acesso_id");//busca id tipo de acesso.

            $agenda = Retorno::find($id);//busca qual agendamento vai para edição.


            if($acesso[0]->acesso_id == 1){
                return view('agendamentoretprof.edit', ['agenda'=>$agenda, 'user'=>$user]);//tela edição de agendamento com informações.

            }else{
                return view('agendamentoretalu.edit', ['agenda'=>$agenda, 'user'=>$user]);//tela edição de agendamento com informações.

            }


        }else{

            return redirect('login')->with('erro1', 'Efetue o login para continuar!');//tela login com erro.

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $agenda = Retorno::find($id);
        $agenda->update([//realiza a alteração dos dados no banco.

            "telefone" => $request->tel,
            "data" => $request->data,
            "hora" => $request->hora
        ]);

        return redirect("/retorno/gerenciar")->with('sucesso', 'Agenda alterada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user()->name;//busca nome usuário.
        $acesso = User::where("name", $user)->get("acesso_id");

    if($acesso[0]->acesso_id == 1){
        Retorno::destroy($id);

        return redirect("/retorno/gerenciar")->with('erro', 'Agendamento excluido com sucesso!');
    }else{
        return redirect('home');
    }

    }
}
