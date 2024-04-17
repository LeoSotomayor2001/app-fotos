@extends('layout.layout')


@section('contenido')
<div class="flex justify-center items-center h-screen">
    <form action="{{ route('publicacion.crear') }}" method="POST" enctype="multipart/form-data"
        class="bg-white shadow-md rounded-lg p-8 max-w-lg w-full">
        @csrf
        <h2 class="text-3xl font-bold mb-4">Crear Publicación</h2>
        <div class="mb-4">
            <label for="titulo" class="block text-xl font-medium text-gray-700">Título</label>
            <input type="text" name="titulo" id="titulo" placeholder="Ingrese el título"
                class="mt-1 p-3 bg-gray-200 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-black rounded-md">
            @error('titulo')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 
            text-center"> {{ $message }} </p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="descripcion" class="block text-xl font-medium text-gray-700">Descripción</label>
            <textarea name="descripcion" id="descripcion" placeholder="Ingrese la descripción" rows="3"
                class="mt-1 p-3 bg-gray-200 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-black rounded-md"></textarea>
            @error('descripcion')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 
                text-center"> {{ $message }} </p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="imagen" class="block text-xl font-medium text-gray-700">Imagen</label>
            <input type="file" name="imagen" id="imagen" placeholder="Seleccione una imagen"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-black rounded-md">
            @error('imagen')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 
                 text-center"> {{ $message }} </p>
            @enderror
        </div>
        <div class="flex justify-end">
            <button type="submit"
                class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded">Crear</button>
        </div>
    </form>
</div>


@endsection