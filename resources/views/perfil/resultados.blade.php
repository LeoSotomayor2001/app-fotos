@extends('layout.layout')

@section('contenido')

<h1 class="text-center font-bold text-3xl mt-2 mb-2">Resultados de la búsqueda:</h1>

<section class="flex justify-center items-center bg-gray-50">
    <ul>
        @forelse ($perfiles as $perfil)
            <li >
                <a href="{{ route('inicio', ['user' => $perfil->username]) }}" 
                    class="py-4 px-6 border-b border-gray-200 hover:shadow-md transition duration-300 flex justify-between items-center gap-2 last-of-type:border-none"
                >

                    <img 
                    src="{{$perfil->imagen ? asset('perfiles') . '/' . $perfil->imagen : asset('img/usuario.svg')}}" 
                    alt="Imagen usuario" 
                    class="w-10 rounded-full"
                    >
                    <h2 class="text-2xl font-bold">{{ $perfil->username }}</h2>
                </a>
            </li>
        @empty
            <svg fill="#e0e407" 
                viewBox="0 -0.5 17 17" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" 
                stroke-width="0"></g><g id="SVGRepo_tracerCarrier" 
                stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill-rule="evenodd" 
                d="M15.35 8c0 3.377-2.945 6.25-6.75 6.25S1.85 11.377 1.85 8 4.795 1.75 8.6 1.75 15.35 4.623 15.35 8zm1.25 0c0 4.142-3.582 7.5-8 7.5S.6 12.142.6 8C.6 3.858 4.182.5 8.6.5s8 3.358 8 7.5zM9.229 3.101l-.014 7.3-1.25-.002.014-7.3 1.25.002zm.016 
                9.249a.65.65 0 1 0-1.3 0 .65.65 0 0 0 1.3 0z">
                </path></g>
            </svg>
            <p class="text-center text-3xl font-bold">No hay resultados para tu búsqueda</p>
            
        @endforelse
    </ul>
</section>



@endsection