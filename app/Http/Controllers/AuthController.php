<?php

namespace App\Http\Controllers;

use App\Models\Acesso;
use App\Models\Agendamentopc;
use App\Models\Paciente;
use App\Models\Statu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

     public function tlogin()
    {

        if (Auth::check()){//verifica se possui usuário logado.

                $user = Auth::user()->name;//busca nome usuario.
                $acesso = User::where("name", $user)->get("acesso_id");//busca id tipo de acesso.
                $status = User::where("name", $user)->get("status_id");//busca id do status do usuário.
                $agenda = Agendamentopc::query()->orderBy('status_id')->get();//busca todos agendamentos.
                $pacientes = Paciente::query()->orderBy('name')->get();
            if($status[0]->status_id == 1){//verifica se é ativa ou inativo.

                if($acesso[0]->acesso_id == 1){//verifica se é aluno ou professor.

                        return view('homeprof.home', ['agenda'=>$agenda, 'user'=>$user, 'pacientes' => $pacientes]);//mostra tela inicial de professores.

                }else{

                        return view('homealu.home', ['agenda'=>$agenda,  'user'=>$user, 'pacientes' => $pacientes]);//mostra tela inicial de alunos.

                }

            }else{

                Auth::logout();// caso seja inativo desloga usuario.
                return redirect('login')->with('erro2', 'Usuário não autorizado!' );//mostra tela login com erro.

            }

        }else{

            return view('login.login');//mostra tela login sem erros.

        }
    }


    public function index()
    {

        if (Auth::check()){//verifica se possui usuário logado.

            return redirect('home');//chama o endereço home.

        }else{

            return redirect('login');//chama o endereço login.

        }

    }

    public function create()
    {

        if (Auth::check()){//verifica se possui usuário logado.

            $user = Auth::user()->name;
            $acesso = User::where("name", $user)->get("acesso_id");

            if($acesso[0]->acesso_id == 1){//verifica se é professor para acessar cadastro de usuário.

                $status = Statu::all();
                $acesso = Acesso::all();

                return view('Login.Register', ['status'=> $status, 'acesso'=> $acesso, 'user'=>$user]);//tela de cadastro de usuário.

            }else{

                return redirect('/')->with('erro1', 'O usuário nao possui acesso!');//tela login com erro.

            }
        }else{

            return redirect('home');//chama o endereço home.

        }

    }

    public function store(Request $request)
    {

        User::create([//salva na tabela user do banco.

            "name" => $request->nameu,
            "password" => Hash::make($request->password),
            "status_id" => $request->status,
            "acesso_id" => $request->acesso,
            "namecomp" => $request->namec,
            "rm" => $request->rm,
            "telefone" => $request->tel
        ]);

        return redirect("user/show")->with('sucesso', 'Usuário cadastrado com sucesso!');//tela inicial com mensagem de sucesso.

    }

    public function home(Request $request)
    {

        if(Auth::check()){//verifica se possui usuário logado.

            $user = Auth::user()->name;//busca nome usuário.
            $acesso = User::where("name", $user)->get("acesso_id");//busca id tipo de acesso.
            $agenda = Agendamentopc::query()->orderBy('status_id')->get();//busca todos agendamentos.
            $pacientes = Paciente::query()->orderBy('name')->get();
            
            if($acesso[0]->acesso_id == 1){//verifica se é aluno ou professor.

                return view('homeprof.home', ['agenda'=>$agenda, 'user'=>$user, 'pacientes' => $pacientes]);//mostra tela inicial de professores.

            }else{

                return view('homealu.home', ['agenda'=>$agenda, 'user'=>$user, 'pacientes' => $pacientes]);//mostra tela inicial de alunos.

            }
        }else{

            return redirect('login')->with('erro1', 'Efetue o login para continuar!');//tela login com erro.

        }


    }

    public function SignIn(Request $request)
    {


        $request->validate([//verifica se os campos estão preenchidos.

            'name' => 'required',
            'password' => 'required',

        ]);

        $credentials = $request->only('name', 'password');//busca o que foi digitado no campo.
        $status = User::where("name", $request->name)->get("status_id");//busca id do status do usuário.

        if(Auth::attempt($credentials)){//compara o usuário e senha digitado com cadastrado no banco.

             if($status[0]->status_id == 1){//verifica se é ativo.

                return redirect('home');//chama endereço home.

            }elseif($status[0]->status_id == 2){//verifica se é inativo.

                Auth::logout();
                return redirect('login')->with('erro2', 'Usuário não autorizado!' );//tela login com erros.

            }

        }else{

            return redirect('login')->with('erro', 'Usuário ou senha inválido!' );//tela login com erros.


        }
    }

    public function show()
    {
        if (Auth::check()){//verifica se possui usuário logado.

                $user = Auth::user()->name;//busca nome usuário.
                $acesso = User::where("name", $user)->get("acesso_id");//busca id tipo de acesso.

            if($acesso[0]->acesso_id == 1){//verifica se é aluno ou professor.

                $users = User::query()->orderBy('id')->get();//busca todos usuários cadastrados no banco.


                return view('login.show', compact('users', 'user'));//tela mostrar login com busca no banco.

            }else{

                return redirect('login')->with('erro1', 'Efetue o login para continuar!');//tela login com erro.
            }
        }else{

            return redirect('home');//chama endereço home.

        }
    }

    public function edit ($id)
    {

            if (Auth::check()){//verifica se possui usuário logado.

                $user = Auth::user()->name;//busca nome usuário.
                $acesso = User::where("name", $user)->get("acesso_id");//busca id tipo de acesso.

            if($acesso[0]->acesso_id == 1){//verifica se é aluno ou professor.

                $users = User::find($id);//busca o id do usuário para edição
                $status = Statu::all();//busca todos status
                $acesso = Acesso::all();//busca todos acessos.



                return view('Login.edit', ['users'=>$users, 'status'=>$status, 'acesso'=>$acesso, 'user'=>$user]);//tela edição com informações

            } else{

                return redirect('login')->with('erro1', 'Efetue o login para continuar!');//tela de login com erro.

            }
        }else{

            return redirect('home');//chama endereço home.

        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);//busca o id do usuário para atualização.


        $user->update([//atualiza dados usuário.
            "namecomp" => $request->namec,
            "password" => Hash::make($request->password),
            "status_id" => $request->status,
            "acesso_id" => $request->acesso,
            "name" => $request->nameu,
            "rm" => $request->rm,
            "telefone" => $request->tel

        ]);

        return redirect("user/show")->with('sucesso1', 'Usuário alterado com sucesso!');//tela mostrar usuarios e mensagem de sucesso.
    }

    public function SignOut()
    {

        if (Auth::check()){//verifica se possui usuário logado.

            Auth::logout();//desçpga o usuário.
            return redirect('login');//tela login sem erros.

        }else{

            return redirect('login');//tela login sem erros.

        }



    }

    public function destroy($id){

        $user = Auth::user()->name;//busca nome usuário.
        $acesso = User::where("name", $user)->get("acesso_id");

    if($acesso[0]->acesso_id == 1){
        User::destroy($id);

        return redirect("user/show")->with('erro', 'Usuário excluido com sucesso!');
    }else{
        return redirect('home');
    }
    }

    public function LogAdm (){

        $status = Statu::all();
        $acesso = Acesso::all();

        return view('Logadm.Register', ['status'=> $status, 'acesso'=> $acesso]);

    }


}
