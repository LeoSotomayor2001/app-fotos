<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fotos-APP</title>
    @vite('resources/css/app.css')

</head>
<body >
    <header class="p-3 bg-white text-white shadow">
        <div class="container flex mx-auto justify-between items-center flex-col md:flex-row">
            @auth
                <a 
                    href="{{route('inicio',auth()->user()->username)}}"
                    class="text-3xl font-bold text-black"    
                >
                    Fotos-App
                </a>
            @endauth
            @guest
                <a 
                    href="{{route('principal')}}"
                    class="text-3xl font-bold text-black"    
                >
                    Fotos-App
                </a>
            @endguest

            
            <form method="POST" action="{{ route('perfiles.buscar') }}">
                @csrf
                <div class="flex justify-between gap-2 items-center">
                    <input
                        type="text"
                        id="terminoBusqueda"
                        name="terminoBusqueda"
                        placeholder="Buscar perfil"
                        class="border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:border-gray-500 w-full text-black"
                    >
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Buscar
                    </button>
                </div>
                
            </form>
            
            

            <nav class="text-xl flex  items-center gap-4 flex-col md:flex-row mt-2 md:mt-0">
                @auth
                <div class="bg-white text-black p-2 rounded-md hover:shadow-md transition duration-300 flex items-center justify-center">
                    <a href="{{ route('notificaciones.index') }}" class="flex items-center gap-2">
                        <img src="{{ asset('img/notificacion.svg') }}" alt="Imagen login de usuarios" class="w-8">
                        <span class="font-semibold">Notificaciones ({{Auth::user()->unreadNotifications->count()}})</span>
                    </a>
                </div>
                <div class="bg-white text-black p-2 rounded-md hover:shadow-md transition duration-300 flex items-center justify-center">
                    <a href="{{route('publicacion.crear')}}" class="flex items-center gap-2">
                        <img src="{{asset('img/camara.svg')}}" alt="Imagen login de usuarios" class="w-8">
                        <span class="font-semibold">Crear</span>
                    </a>
                </div>

                <div class="bg-white text-black p-2 rounded-md hover:shadow-md transition duration-300  flex items-center justify-center">
                    <form action="{{route('logout')}}" method="POST" class="m-0">
                        @csrf
                        <button 
                            type="submit"
                            class="flex items-center gap-2"
                        >
                            <img src="{{asset('img/logout.svg')}}" alt="Imagen login de usuarios" class="w-8">
                            <span class="font-semibold">Cerrar Sesión</span>
                        </button>
                    </form>
                </div>
                
                    
                @endauth

                @guest
                    
                    <a href="{{route('login')}}" class="text-sky-600">Login</a>
                    <a href="{{route('register')}}" class="text-sky-600">Registro</a>
                @endguest
            </nav>
        </div>
    </header>

    <main>
        @yield('contenido')

    </main>

    <footer class="text-center font-bold mt-10 p-5 text-gray-600">
        Fotos-App Todos los derechos reservados. Leodomí Sotomayor {{now()->year}}
    </footer>
    @vite('resources/js/app.js')
    
</body>
</html>