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

class PublicacionController extends Controller
{
    
    public function index(User $user){
        
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

}
