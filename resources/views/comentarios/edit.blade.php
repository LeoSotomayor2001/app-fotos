@extends('layout.layout')

@section('contenido')
<form action="{{ route('comentarios.update', ['publicacion' => $publicacion, 'comentario' => $comentario]) }}" method="POST" class="max-w-md mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow">
    @csrf
    @method('PUT')
    <div>
        <label for="comentario" class="block font-medium text-gray-700">Modificar comentario:</label>
        <textarea name="comentario" id="comentario" rows="5" class="form-textarea mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $comentario->comentario }}</textarea>
    </div>
    @error('comentario')
        <p class="text-red-500">{{ $message }}</p>
    @enderror
    <div class="mt-6">
        <button type="submit" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-600 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:opacity-75">Guardar cambios</button>
    </div>
</form>

@endsection