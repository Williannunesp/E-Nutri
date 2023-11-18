<?php

namespace App\Http\Controllers;

use App\Models\Agendamentopc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Psy\Readline\Hoa\Event as HoaEvent;

class PrimeiraconsultaController extends Controller
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
    public function create(String $id)
    {
        $agenda = Agendamentopc::find($id);
        $user = Auth::user()->name;//busca nome usuário.
        $acesso = User::where("name", $user)->get("acesso_id");//busca id tipo de acesso.
        if($acesso[0]->acesso_id == 1){
            return view('primeiraconsultaprof.create', compact('agenda', 'user') );
        }else{
            return view('primeiraconsultaalu.create', compact('agenda', 'user') );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $user = Auth::user()->name;



        $agenda = Agendamentopc::find($id);


        if($request->fichapc){
            $extensionpc = $request->fichapc->extension();
            if($extensionpc == 'pdf'){
            // $fichapcname = $agenda->name . "_Primeira_Consulta" . now() . "." . $extensionpc;

            $cpc = $request->fichapc->store('primeira_consulta');
            }else{
                return view('primeiraconsultaprof.create', compact('user', 'agenda'))->with('erro', 'Insira um arquivo Válido!');
            }

            } if($request->fichaav){
                $extensionav = $request->fichaav->extension();
                if($extensionav == 'pdf'){
                // $fichaavname = $agenda->name . "_Avaliação_Antropometrica" . now() . "." . $extensionav;

                $cav = $request->file('fichaav')->store('pcav_antropometrica');
                }else{
                    return view('primeiraconsultaprof.create', compact('user', 'agenda'))->with('erro', 'Insira um arquivo Válido!');
                }
            }  if($request->dieta){
                $extensiondie = $request->dieta->extension();
                if($extensiondie == 'pdf'){
                // $dietaname = $agenda->name . " Dieta " . now() . "." . $extensiondie;

                $cdie = $request->file('dieta')->store('pcdieta');
                }else{
                    return view('primeiraconsultaprof.create', compact('user', 'agenda'))->with('erro', 'Insira um arquivo Válido!');
                }

            }else{
                $cdie = 0;
            }
         

        $agenda->update([
            'descriçãofichapc' => $request->descpc,
            'fichapc' => $cpc,
            'descriçãoantro' => $request->descav,
            'antropometrica' => $cav,
            'descriçãodieta' => $request->descdie,
            'dieta' => $cdie,
            'status_id' => 2,
            'username' => $user,
        ]);


        return redirect('home')->with('sucesso', 'Consulta Finalizada');

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
