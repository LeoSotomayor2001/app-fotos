<section class="mt-10 ">
    <h2 class="text-4xl text-center font-black my-10 md:col-span-2">Publicaciones</h2>
    <div class="grid gap-4 md:grid-cols-3">
        @forelse ($publicaciones as $publicacion)
        <a href="{{ route('publicacion.show', [$user, $publicacion]) }}" class="bg-white p-4">
            <img 
                src="{{ $publicacion->imagen ? asset('publicaciones') . '/' . $publicacion->imagen : asset('img/usuario.svg') }}" 
                alt="Imagen usuario" 
                class="w-full transition-transform hover:scale-105"
            >
        </a>
        <!-- Aquí puedes agregar el contenido adicional de la publicación -->
        @empty
            <div class="col-span-2 flex justify-center items-center h-full">
                <h2 class="text-center text-2xl w-full">No hay publicaciones aún</h2>
            </div>
        @endforelse
    </div>

    <!-- Paginación si es necesario -->
    {{ $publicaciones->links() }}
</section>