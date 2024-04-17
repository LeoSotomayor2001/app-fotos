<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(User $user){

        $publicaciones=Publicacion::where('user_id',$user->id)->latest()->paginate(10);
       
        return view('perfil.index',[
            'user' => $user,
            'publicaciones' => $publicaciones
        ]);
    }
    public function logout(){
        auth()->logout();

        return redirect()->route('login');
    }


}
