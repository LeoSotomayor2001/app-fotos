@extends('layout.layout')

@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center mt-10">
    <div class="md:w-6/12 p-5">
        <img src="{{asset('img/login.svg')}}" alt="Imagen login de usuarios" class="w-80">
    </div>
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
        <form method="POST" action="{{route('login')}}" novalidate>
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
            <input 
                type="submit" 
                value="Iniciar Sesión"
                class="bg-indigo-600 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold w-full
                        p-3 text-white rounded-lg mb-5"
            >
            <a href="{{route('register')}}" class="text-clip text-gray-700">
                ¿No tienes cuenta? Crea una
            </a>
        </form>
    </div>
</div>
   

@endsection