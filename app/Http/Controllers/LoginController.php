<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){

        return view('auth.login');
    }
    public function store(LoginRequest $request){
        
        $request->validated();
        if(!auth()->attempt($request->only('email','password'),$request->remember ) ){
            return back()->with('mensaje','Credenciales Incorrectas');
        }

        //return redirect()->route('posts.index', auth()->user()->username );
        return redirect()->route('inicio', auth()->user()->username );
    }

}
