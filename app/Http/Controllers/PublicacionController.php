<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use App\Http\Requests\PublicacionesRequest;
use App\Models\Publicacion;
use App\Models\User;
use App\Notifications\LikeNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class PublicacionController extends Controller
{
    
    public function index(User $user){
        
    }
        // Método like
    public function like(Publicacion $publicacion, Request $request)
    {

        $publicacion->likes()->attach(auth()->user()->id);
        $publicacion->increment('likes_count');
        
        $likeUser = $request->user(); // Obtén el usuario que dio like

        // Crea la instancia de la notificación
        $notification = new LikeNotification($likeUser, $publicacion);

        // Envía la notificación al usuario propietario de la publicación
        $publicacion->user->notify($notification);

            return redirect()->back();
        }
    public function unlike(Publicacion $publicacion){
        $publicacion->likes()->detach(auth()->user()->id);
        $publicacion->decrement('likes_count');

        return redirect()->back();
    }
    public function create(){

        return view('publicaciones.create');
    }
    public function store(PublicacionesRequest $request){
        $request->validated();
        try{
            $imagen=$request->file('imagen');
            
            $nombreImagen=Str::uuid() . '.' . $imagen->extension();
            $imagenServidor=Image::make($imagen);
            $imagenServidor->fit(1000,1000);
            
            if(!is_dir(public_path('publicaciones'))){
                mkdir('publicaciones');
            }
            $imagenPath=public_path('publicaciones') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
            }
        catch(Exception $e){
            Log::channel('error')->error('Ha ocurrido un error' . $e->getMessage());
        }
        
        $publicacion=new Publicacion();
        $publicacion->titulo=$request->titulo;
        $publicacion->descripcion=$request->descripcion;
        $publicacion->imagen=$nombreImagen;
        $publicacion->user_id=auth()->user()->id;
        $publicacion->save();

        return redirect()->route('inicio',auth()->user()->username);

    }
    public function show(User $user,Publicacion $publicacion){
        return view('publicaciones.show',[
            'publicacion' => $publicacion,
            'user' => $user
        ]);
    }
    
    /** 
     * Delete a publication.
     *
     * @param Publicacion $publicacion The publication to be deleted.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Publicacion $publicacion){
        // Deletes the publication from the database.
        $publicacion->delete();
        
        // Redirects to the user's inicio page.
        return redirect()->route('inicio',auth()->user()->username);
    }

}
