<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(User $user){

        return view('perfil.index',[
            'user' => $user
        ]);
    }
    public function logout(){
        auth()->logout();

        return redirect()->route('login');
    }

}
