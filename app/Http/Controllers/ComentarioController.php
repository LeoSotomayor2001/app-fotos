<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComentarioRequest;
use App\Models\User;
use App\Models\Comentario;
use App\Models\Publicacion;
use App\Notifications\NuevoComentarioNotificacion;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(ComentarioRequest $request,User $user,Publicacion $publicacion)
    {
        //Validar
        $request->validated();
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
    public function destroy(Request $request, Publicacion $publicacion, $comentarioId){
        //Eliminar comentario
        $comentario = Comentario::findOrFail($comentarioId);
        $comentario->delete();
        return back()->with('mensaje', 'Comentario borrado Correctamente');
    }
}