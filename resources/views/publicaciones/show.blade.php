@extends('layout.layout')


@section('contenido')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-4 text-center">{{ $publicacion->titulo }}</h1> <!-- Título de la publicación -->
    
    <img src="{{ asset('publicaciones/' . $publicacion->imagen) }}" alt="{{ $publicacion->titulo }}" class="mx-auto mb-4 max-w-96"> <!-- Imagen de la publicación centrada -->

    <p class="text-lg text-center">{{ $publicacion->descripcion }}</p> <!-- Descripción de la publicación -->
</div>


@endsection