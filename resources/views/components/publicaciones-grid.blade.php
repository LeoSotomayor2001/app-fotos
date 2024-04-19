<section class="mt-10 ">
   
    <div class="grid gap-2 md:grid-cols-4">
        @forelse ($publicaciones as $publicacion)
        <a href="{{ route('publicacion.show', [$user, $publicacion]) }}" class="bg-white p-4">
            <img 
                src="{{ $publicacion->imagen ? asset('publicaciones') . '/' . $publicacion->imagen : asset('img/usuario.svg') }}" 
                alt="Imagen usuario" 
                class="w-full transition-transform hover:scale-105 md:w-80"
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