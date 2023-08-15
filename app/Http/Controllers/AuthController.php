<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.login',);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()){
            return view('Login.Register');
        } else{
            return redirect('/')->with('erro1', 'Efetue o login para continuar!');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required',
            "password" => 'required|min:8'
        ]);

        $inf = $request->all();

        $user = User::create([
            "name" => $inf['name'],
            "password" => Hash::make($inf['password'])
        ]);

        return redirect("showuser")->with('sucesso', 'Usuário cadastrado com sucesso!');
    }

    public function home()
    {
        if (Auth::check()){
            return view('home.home');
        } else{
            return redirect('/')->with('erro1', 'Efetue o login para continuar!');
        }

    }

    public function SignIn(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('name', 'password');
        if(Auth::attempt($credentials)){
            
            return redirect('home');
        }else{
            
            return redirect('/')->with('erro', 'Usuário ou senha inválido!');
            
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        if (Auth::check()){
            $users = User::query()->orderBy('id')->get();

            return view('login.show', compact('users'));
        } else{
            return redirect('/')->with('erro1', 'Efetue o login para continuar!');
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit ($id)
    {

        if (Auth::check()){
            $user = User::find($id);
            return view();
        } else{
            
            return redirect('/')->with('erro1', 'Efetue o login para continuar!');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->update([
            "password" => Hash::make($request->password)
        ]);
    }

    public function SignOut()
    {
        
        if (Auth::check()){
            Auth::logout();
            return redirect('/');
        } else{
            return redirect('/');
        }
        

       
    }
    
    /**
     * Remove the specified resource from storage.
     */

}
