<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index(){

        return view('auth.Register');
    }
    public function store(RegisterRequest $request){

        $request->validated();
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password) 
        ]);
        //autenticar un usuario
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password 
        // ]);

        //otra forma de autenticar
        auth()->attempt($request->only('email','password'));
        
        return redirect()->route('inicio', auth()->user()->username );
    }
}
