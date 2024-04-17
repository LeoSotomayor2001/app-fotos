@extends('layout.layout')


@section('contenido')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-4 text-center">{{ $publicacion->titulo }}</h1> <!-- Título de la publicación -->
    
    <img src="{{ asset('publicaciones/' . $publicacion->imagen) }}" alt="{{ $publicacion->titulo }}" class="mx-auto mb-4 max-w-96"> <!-- Imagen de la publicación centrada -->
    <p class="text-lg text-center">{{ $publicacion->descripcion }}</p> <!-- Descripción de la publicación -->
    @if(auth()->user() && auth()->user()->id === $user->id)
    <form action={{route("publicacion.destroy", $publicacion->id)}} method="POST" class="text-center mt-8">
        @csrf
        @method('DELETE')
        <button
            type="submit"
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
        >Eliminar Publicación</button>
    
    </form>
    @endif
</div>


@endsection