<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;
use App\Http\Requests\PerfilRequest;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function index(){


        return view('perfil.editar');
    }
    public function store(PerfilRequest $request){
        $request->validated();

        if($request->imagen){

             // Obtener el nombre de la imagen anterior
            $nombreImagenAnterior = auth()->user()->imagen;

            // Eliminar la imagen anterior si existe
            if ($nombreImagenAnterior) {
                $rutaImagenAnterior = public_path('perfiles') . '/' . $nombreImagenAnterior;
                if (file_exists($rutaImagenAnterior)) {
                    unlink($rutaImagenAnterior);
                }
            }
            try{
            $imagen=$request->file('imagen');
            
            $nombreImagen=Str::uuid() . '.' . $imagen->extension();
            $imagenServidor=Image::make($imagen);
            $imagenServidor->fit(1000,1000);
            
            if(!is_dir(public_path('perfiles'))){
                mkdir('perfiles');
            }
            $imagenPath=public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
            }
            catch(Exception $e){
                Log::channel('error')->error('Ha ocurrido un error' . $e->getMessage());
            }
        }   

        //Guardar cambios
        $usuario=User::find(auth()->user()->id);
        $usuario->username=$request->username;
        $usuario->email=$request->email;
        $usuario->imagen=$nombreImagen ?? auth()->user()->imagen ?? '';

        //Verifica si el campo password tiene algo escrito
        if ($request->password) {
            //Compara la contraseña introducida con la que esta guardada en la BD
            if (!Hash::check($request->password, auth()->user()->password)) {
                return back()->with('mensaje', 'La contraseña actual es incorrecta.');
            }
            else{
                //Verifica si hay algo escrito en el campo password_nuevo
               if($request->password_nuevo){
                    //Guarda la nueva contraseña
                    $usuario->password= Hash::make($request->password_nuevo);
               }
               else{
                    return back()->with('mensaje', 'La contraseña nueva es obligatoria.');
               }
            }
        }
        
        $usuario->save();
        //Redireccionar
        return redirect()->route('inicio',$usuario->username);
    }
    public function buscar(Request $request){
        $terminoBusqueda = $request->terminoBusqueda;
        $perfiles = User::where('username', 'like', "%$terminoBusqueda%")->get();

        return view('perfil.resultados',[
            'perfiles' => $perfiles
        ]);
    }
}
