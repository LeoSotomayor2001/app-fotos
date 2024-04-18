<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comentario;
use App\Models\Publicacion;
use App\Notifications\NuevoComentarioNotificacion;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request,User $user,Publicacion $publicacion)
    {
        //Validar
        $request->validate([
            'comentario' => 'required|max:255'
        ]);
        //Almacenar el resultado
        $comentario=Comentario::create([
            'user_id'=> auth()->user()->id,
            'publicacion_id'=> $publicacion->id ,
            'comentario' => $request->comentario
        ]);
        $user->notify(new NuevoComentarioNotificacion($publicacion, $comentario));
        //Imprimir un mensaje
        return back()->with('mensaje','Comentario Realizado Correctamente');
    }
}