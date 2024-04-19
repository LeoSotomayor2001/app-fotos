@extends('layout.layout')

@section('contenido')
<div class="container  mt-10 grid grid-cols-1 md:grid-cols-12 gap-4">
    <div class="col-span-8">
        <h1 class="text-3xl font-bold mb-4 text-center">{{ $publicacion->titulo }}</h1>
        <!-- Título de la publicación -->

        <img src="{{ asset('publicaciones/' . $publicacion->imagen) }}" alt="{{ $publicacion->titulo }}"
            class="mx-auto mb-4 w-full md:w-96"> 
        <p class="text-lg text-center">{{ $publicacion->descripcion }}</p>
        <!-- Mostrar el conteo de likes -->
        <div class="flex gap-4 justify-center items-center">
            <p class="text-center">{{ $publicacion->likes_count }} Likes</p>
            
            @auth
                <!-- Botón de "like" -->
                <form action="{{ route('publicacion.like', $publicacion) }}" method="POST" class="text-center">
                    @csrf
                    @if ($publicacion->likes()->where('user_id', auth()->user()->id)->exists())
                        @method('DELETE')
                        <button type="submit" class="text-white font-bold rounded-lg p-1 bg-red-600">
                            Quitar like
                        </button>
                    @else
                        <button type="submit" class="text-white font-bold rounded-lg p-1 bg-blue-600">
                            Me gusta
                        </button>
                    @endif
                </form>
            @endauth
            

        </div>
        @if(auth()->user() && auth()->user()->id === $user->id)
        <form action={{route("publicacion.destroy", $publicacion->id)}} method="POST" class="text-center mt-8">
            @csrf
            @method('DELETE')
            <button type="submit" id="eliminarPublicacion" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar
                Publicación</button>
        </form>
        @endif
    </div>

    <div class="col-span-4">
        <div class="bg-white p-4 rounded">
            <h2 class="text-2xl font-bold mb-4">Comentarios</h2>
            @if(session('mensaje'))
                <p class="bg-green-600 text-white p-2 uppercase text-center font-bold">
                    {{session('mensaje')}}
                </p>   
            @endif
            <!-- Formulario para enviar un nuevo comentario -->
           @auth
               
           <form action="{{route('comentarios.store',['publicacion' => $publicacion,'user' => $user])}}" method="POST">
               @csrf
               <label for="comentario" class="block mb-2">Escribir comentario:</label>
               <textarea name="comentario" id="comentario" cols="30" rows="4"
                   class="border border-gray-300 p-2 rounded w-full"></textarea>
               @error('comentario')

                   <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> 
                       {{ $message }} 
                   </p>
               @enderror
               <button type="submit"
                   class="bg-blue-500 mb-3 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Enviar
                   comentario</button>
           </form>
           @endauth
            {{-- Mostrar los comentarios desde el ultimo hasta el primero --}}
          <div class="overflow-y-auto max-h-96">
              @forelse ($publicacion->comentarios->sortByDesc('created_at') as $comentario)

                  <div class="bg-gray-100 p-4 rounded-lg mb-4">
                      <div class="flex gap-2 items-center mb-2">
                           <img 
                               src="{{ $comentario->user->imagen ? asset('perfiles') . '/' . $comentario->user->imagen : asset('img/usuario.svg') }}" 
                               alt="Imagen usuario" 
                               class="w-10 rounded-full"
                           >
                          <span class="font-bold">{{ $comentario->user->username }}</span>
                          
                          @auth
                            @if (auth()->user()->id === $comentario->user_id)
                                <form action="{{ route('comentarios.destroy', [$publicacion, $comentario]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="text-red-500 mr-1 ml-1"
                                        id="eliminarComentario"
                                    >
                                        Eliminar
                                    </button>
                                </form>
                            @endif
                            @if (auth()->user()->id === $comentario->user_id)
                                <a href="{{ route('comentarios.edit', ['publicacion' => $publicacion, 'comentario' => $comentario]) }}" class="text-blue-500">Editar</a>
                            @endif
                              
                          @endauth
                      </div>
                      <p class="text-gray-800">{{ $comentario->comentario }}</p>
                      <span class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</span>
                  </div>
              @empty
                  <p class="text-center text-gray-500">No hay comentarios aún.</p>
              @endforelse
          </div>
            
        </div>
    </div>
</div>
@endsection