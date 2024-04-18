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
  

  public function edit(Publicacion $publicacion, Comentario $comentario)
  {
      // Verificar si el usuario es el creador del comentario
      if (auth()->user()->id !== $comentario->user_id) {
          return redirect()->back()->with('error', 'No tienes permiso para modificar este comentario');
      }
  
      // Obtener el usuario asociado a la publicación
      $user = $publicacion->user;
  
      return view('comentarios.edit', compact('publicacion', 'comentario', 'user'));
  }
    public function update(ComentarioRequest $request,  Publicacion $publicacion, $comentarioId){
        $request->validated();
        $user = $publicacion->user;
        $comentario = Comentario::findOrFail($comentarioId);
        $comentario->update([
            'comentario' => $request->comentario
        ]);
        return redirect()->route('publicacion.show', [$user, $publicacion])->with('mensaje', 'Comentario actualizado Correctamente');
    }
}