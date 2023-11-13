<?php

namespace App\Http\Controllers;


use App\Models\Agendamentopc;
use App\Models\Paciente;
use App\Models\Statu;
use App\Models\StatusConsulta;
use App\Models\Telefone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendamentopcController extends Controller
{

    public function index()
    {


    }

    public function create()
    {
        if(Auth::check()){//verifica se possui usuário logado.


            $statu = StatusConsulta::where('id', 1)->get('name');//busca por status de não atendido como padrão.


            return view('agendamentopcprof.create', ['statu'=>$statu]);//tela agendamento com informações.

        }else{

            return redirect('login')->with('erro1', 'Efetue o login para continuar!');//tela login com erro.

        }
    }

    public function store(Request $request)
    {


        Paciente::create([
            "name" => $request->name,
            "celular" => $request->tel
        ]);

        $pacienteid = Paciente::where("name", $request->name)->get("id");//busca id do paciente para vincular com agendamento primeira consulta.



        Agendamentopc::create([//salva no banco um agendamento de consulta.

            "name" => $request->name,
            "telefone" => $request->tel,
            "data" => $request->data,
            "hora" => $request->hora,
            "paciente_id" => $pacienteid[0]->id,
            "status_id" => 1

        ]);

        return redirect("home")->with('sucesso', 'Paciente Agendado com sucesso');//tela inicial com mensagem de sucesso.


    }
    public function list(){

        if (Auth::check()){//verifica se possui usuário logado.

            $user = Auth::user()->name;//busca nome usuário.
            $acesso = User::where("name", $user)->get("acesso_id");//busca id tipo de acesso.


            if($acesso[0]->acesso_id == 1){//verifica se é aluno ou professor.


                $agendamentopc = Agendamentopc::query()->orderBy('data', 'desc')->get();//busca todos agendamentos cadastrados no banco.


                return view('AgendamentopcProf.geren',['agendamentopc'=>$agendamentopc, 'user'=>$user]);//tela mostrar login com busca no banco.

            }else{

                $agendamentopc = Agendamentopc::query()->orderBy('data', 'desc')->get();//busca todos agendamentos cadastrados no banco.


                return view('AgendamentopcAlu.geren',['agendamentopc'=>$agendamentopc, 'user'=>$user]);
            }
        }else{

            return redirect('home');//chama endereço home.

        }
    }

    public function selecionar(){

        $user = Auth::user()->name;

        $agendamentopc = Agendamentopc::where('status_id', 1)->orderBy('data')->get();

        return view('agendamentopcprof.list', ['agendamentopc'=>$agendamentopc, 'user'=>$user]);
    }

    public function show($id, Request $request)
    {
        if(Auth::check()){//verifica se possui usuário logado.

            $agenda = Agendamentopc::find($id);//busca qual agendamento vai para edição.
            $statu = StatusConsulta::where('id', 1)->get('name');//busca por status de não atendido como padrão.


            return view('agendamentopcprof.show', ['agenda'=>$agenda, 'statu'=>$statu]);//tela edição de agendamento com informações.

        }else{

            return redirect('login')->with('erro1', 'Efetue o login para continuar!');//tela login com erro.

        }
    }

    public function edit(string $id)
    {
        if(Auth::check()){//verifica se possui usuário logado.

            $agenda = Agendamentopc::find($id);//busca qual agendamento vai para edição.
            $statu = StatusConsulta::where('id', $agenda->status_id)->get('name');//busca por status de não atendido como padrão.

            return view('agendamentopcprof.edit', ['agenda'=>$agenda, 'statu'=>$statu]);//tela edição de agendamento com informações.

        }else{

            return redirect('login')->with('erro1', 'Efetue o login para continuar!');//tela login com erro.

        }
    }

    public function update(Request $request, string $id)
    {
        $agenda = Agendamentopc::find($id);//busca id para efetuar a edição do agendamento.

        $agenda->update([//realiza a alteração dos dados no banco.

            "data" => $request->data,
            "hora" => $request->hora
        ]);

        return redirect('home')->with('sucesso', 'Agenda alterada com sucesso.');//chama home com mensagem de sucesso
    }


    public function destroy(string $id)
    {

    }
}
