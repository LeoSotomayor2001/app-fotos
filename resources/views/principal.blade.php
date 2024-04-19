@extends('layout.layout')

@section('contenido')
@auth
<h2 class="text-3xl text-center font-black my-10 md:col-span-2">Publicaciones de las personas que sigues:</h2>
<x-publicaciones-grid :publicaciones="$publicaciones" :user="$user"/>
    
@endauth

@guest
<div class="flex flex-col justify-center items-center mt-10">
  <h1 class="text-4xl font-bold text-center text-sky-600">Bienvenido</h1>
  <div class="text-center mt-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-4">¡Únete a nuestra comunidad!</h2>
    <p class="text-sky-600 text-lg leading-loose">
      Descubre contenido exclusivo, conéctate con personas afines a tus intereses y aprovecha todas las ventajas que nuestra plataforma tiene para ofrecerte. Al crear una cuenta, podrás:
    </p>
    <ul class="text-center text-black mt-6">
      <li class="flex items-center mb-4 justify-center">
        <img src="{{ asset('img/camara.svg') }}" alt="Imagen cámara" class="w-8 mr-2">
        <span>Crear tus propias publicaciones y compartir tus ideas.</span>
      </li>
      
      <li class="flex items-center mb-4 justify-center">
        <img src="{{ asset('img/user.svg') }}" alt="Imagen usuario" class="w-8 mr-2">
        <span>Seguir a otros usuarios y estar al tanto de sus actualizaciones.</span>
      </li>

      <li class="flex items-center mb-4 justify-center">
        <img src="{{ asset('img/write.svg') }}" alt="Imagen escribir" class="w-8 mr-2">
        <span>Participar en discusiones y comentarios en las publicaciones.</span>
      </li>

      <li class="flex items-center justify-center">
        <img src="{{ asset('img/notificacion.svg') }}" alt="Imagen notificación" class="w-8 mr-2">
        <span>Recibir notificaciones cuando un usuario interactúe con tu perfil.</span>
      </li>

    </ul>
    <p class="text-sky-600 text-lg mt-6">
      No te pierdas la oportunidad de formar parte de nuestra comunidad. ¡Regístrate ahora y comienza a explorar todo lo que tenemos preparado para ti!
    </p>
    <a href="{{ route('register') }}" class="inline-block bg-blue-500 text-white font-semibold px-4 py-2 mt-8 rounded hover:bg-blue-600 transition duration-200">Crear cuenta</a>
  </div>
</div>



@endguest

@endsection