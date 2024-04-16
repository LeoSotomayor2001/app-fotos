@extends('layout.layout')

@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center mt-10">
    <div class="md:w-6/12 p-5">
        <img src="{{asset('img/register.svg')}}" alt="Imagen login de usuarios" class="w-80">
    </div>
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
        <form method="POST" action="{{route('register')}}" novalidate>
            @csrf
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                <div class="flex justify-between gap-2 items-center">
                    <img src="{{asset('img/user.svg')}}" alt="Imagen login de usuarios" class="w-10">
                    <input 
                        type="text"
                        id="email"
                        name="name"
                        placeholder="Ej: Ana"    
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{old('name')}}"
                    >
                   
                </div>
                @error('name')
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
                        id="email"
                        name="username"
                        placeholder="Tu nombre de usuario"    
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{old('username')}}"
                    >
                   
                </div>
                @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 
                    text-center"> {{ $message }} </p>
                @enderror
               
            </div>

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
                        value="{{old('email')}}"
                    >
                   
                </div>
                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 
                    text-center"> {{ $message }} </p>
                @enderror
               
            </div>

            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                <div class="flex gap-2">
                    <img src="{{asset('img/password.svg')}}" alt="Imagen login de usuarios" class="w-10">
                    <input 
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Tu password"    
                    class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                >
                </div>
                @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 
                    text-center"> {{ $message }} </p>
                @enderror
               
            </div>

            <div class="mb-5">
                <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir Password</label>
                <div class="flex gap-2">
                    <img src="{{asset('img/repetirpass.svg')}}" alt="Imagen login de usuarios" class="w-10">
                    <input 
                    type="password"
                    id="password"
                    name="password_confirmation"
                    placeholder="Repite tu password"    
                    class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                >
                </div>
               
            </div>
            <input 
                type="submit" 
                value="Crear Cuenta"
                class="bg-indigo-600 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold w-full
                        p-3 text-white rounded-lg mb-5"
            >
            <a href="{{route('login')}}" class="text-clip text-gray-700">
                ¿Ya tienes cuenta? Inicia Sesión
            </a>
        </form>
    </div>
</div>
   

@endsection