@extends('layout.layout')

    
@section('contenido')

<h1 class="text-center text-3xl mt-10 mb-5">Editar Perfil: {{auth()->user()->username}}</h1>
<div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl m-auto flex justify-center items-center">
    <form method="POST" action="{{route('perfil.store')}}" novalidate enctype="multipart/form-data">
        @if (session('mensaje'))
            <p class="bg-red-600 text-white p-3 uppercase text-center font-bold">
                {{session('mensaje')}}

            </p>
        @endif
        @csrf
        <div class="mb-5">
            <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
            <div class="flex justify-between gap-2 items-center">
                <img src="{{asset('img/email.svg')}}" alt="Imagen login de usuarios" class="w-10">
                <input 
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Tu Email"    
                    class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                    value="{{auth()->user()->email }}"
                >
               
            </div>
            @error('email')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 
                text-center"> {{ $message }} </p>
            @enderror
           
        </div>

        <div class="mb-5">
            <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
            <div class="flex justify-between gap-2 items-center">
                <img src="{{asset('img/user.svg')}}" alt="Imagen login de usuarios" class="w-10">
                <input 
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Tu username"    
                    class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                    value="{{auth()->user()->username }}"
                >
               
            </div>
            @error('username')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 
                text-center"> {{ $message }} </p>
            @enderror
           
        </div>

        <div class="mb-5">
            <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen</label>
            <div class="flex justify-between gap-2 items-center">
                
                <input 
                    type="file"
                    id="imagen"
                    name="imagen"   
                    accept=".jpg ,.jpeg,.png"
                >
               
            </div>        
        </div>

        <div class="border border-gray-300 mb-3 p-3">
            <p class="text-2xl text-gray-400">Opcional</p>
            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                <div class="flex gap-2">
                    <input 
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Tu password"    
                    class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                >
                </div>
                @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 
                    text-center"> {{ $message }} </p>
                @enderror
               
            </div>
            <div class="mb-5">
                <label for="password_nuevo" class="mb-2 block uppercase text-gray-500 font-bold">Repetir password</label>
                <div class="flex gap-2">
                    <input 
                    type="password"
                    id="password_nuevo"
                    name="password_nuevo"
                    placeholder="Repite tu password"    
                    class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                >
                </div>   
            </div>
        </div>

        
        <input 
            type="submit" 
            value="Guardar Cambios"
            class="bg-indigo-600 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold w-full
                    p-3 text-white rounded-lg mb-5"
        >
    </form>
</div>


@endsection