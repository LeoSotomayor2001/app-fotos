@extends('layout.layout')

@section('contenido')



<section class="mt-20 flex flex-col items-center md:flex-row md:justify-center gap-2">
    <div class="flex flex-col items-center">
        <h1 class="text-center text-3xl font-bold md:mb-2">{{$user->username}}</h1>
        <img 
            src="{{$user->imagen ? asset('perfiles') . '/' . $user->imagen : asset('img/usuario.svg')}}" 
            alt="Imagen usuario" 
            class="w-72 rounded-full transition-transform hover:scale-105"
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
        <p class="text-2xl mb-3">Fotos Subidas: 0</p>
    </div>
</section>

<section class="container mx-auto mt-10 ">
    <h2 class="text-4xl text-center font-black my-10 md:mr-20">Publicaciones</h2>
   
</section>


@endsection