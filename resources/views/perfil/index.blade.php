@extends('layout.layout')

@section('contenido')


<h1 class=" text-3xl font-bold md:mb-2 text-center mt-10">{{$user->username}}</h1>
<section class="mt-20 flex flex-col items-center md:flex-row md:justify-center gap-2">
    <div class="flex flex-col items-center">
        <img 
            src="{{$user->imagen ? asset('perfiles') . '/' . $user->imagen : asset('img/usuario.svg')}}" 
            alt="Imagen usuario" 
            class="w-72 rounded-full "
         >
    
    </div>

    <div class="flex flex-col gap-3">
       
        <div class="flex flex-row gap-2 items-center">
           <!-- Verifica si el usuario autenticado es el propietario del perfil mostrado -->
            @if(auth()->user() && auth()->user()->id === $user->id)
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
                <a href="{{ route('editar.perfil') }}" class="text-2xl" title="Editar Perfil">
                    Editar Perfil
                </a>
            @endif
        </div>
        <p class="text-2xl mb-3">Publicaciones: {{ $user->publicacion->count() }}</p>
        <p class="text-2xl mb-3">Seguidores: {{$user->followers->count()}}</p>
        <p class="text-2xl mb-3">Siguiendo: {{$user->followings->count()}}</p>
       
        @auth
        @if(Auth::id() !== $user->id)
            @if (!$user->siguiendo( auth()->user() ))
                <form action="{{route('users.follow',$user)}}" method="POST">
                @csrf
                <input type="submit" class="bg-blue-500 text-white uppercase rounded-lg p-3 py-1
                text-xs font-bold cursor-pointer" value="Seguir">
                </form>
            @else
                <form action="{{route('users.unfollow',$user)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="bg-red-500 text-white uppercase rounded-lg p-3 py-1
                    text-xs font-bold cursor-pointer" value="Dejar de Seguir">
                </form>
            @endif
        @endif
           
        @endauth
    </div>
 
</section>

<x-publicaciones-grid :publicaciones="$publicaciones" :user="$user"/>

@endsection