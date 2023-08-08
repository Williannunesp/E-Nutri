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
        //
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
        $request->validate([
            "name" => 'required|unique:users',
            "password" => 'required|min:8'
        ]);

        $inf = $request->all();

        $user = User::create([
            "name" => $inf['name'],
            "password" => Hash::make($inf['password'])
        ]);

        return redirect("home");
    }

    public function home()
    {
        if (Auth::check()){
            return view();
        } else{
            return redirect();
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
            return redirect('index');
        }else{
            return redirect();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $users = User::query()->orderBy('id')->get();

        return view('login.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit ($id)
    {
        $user = User::find($id);
        return view();
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
        Auth::logout();

        return redirect();
    }
    
    /**
     * Remove the specified resource from storage.
     */

}
