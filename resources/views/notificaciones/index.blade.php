@extends('layout.layout')

@section('contenido')
    <div class="container m-auto">
        <h2 class="text-2xl font-bold mb-4 text-center">Notificaciones</h2>
        
        <div class="mb-3 p-1 bg-gray-100 border border-gray-400 rounded-lg">
            <h3 class="text-lg font-semibold mb-2 text-center">Notificaciones no leídas:</h3>
            @if ($notificaciones->count() > 0)
                <ul class="notification-list">
                    @foreach ($notificaciones as $notificacion)
                    <li class="mb-1 p-1 bg-white border border-white rounded-lg">
                        <div class="flex items-center">
                            <div class="flex-grow">
                                <h4 class="text-lg font-semibold">{{ $notificacion->data['title'] }}</h4>
                                <p class="text-gray-600">{{ $notificacion->data['message'] }}</p>
                                <a href="{{ $notificacion->data['action_url'] }}" class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-700">{{ $notificacion->data['action_text'] }}</a>
                            </div>
                            <img
                                src="{{asset('perfiles') . '/' . $notificacion->data['user_image'] }}"
                                alt="Imagen usuario" 
                                class="w-10 rounded-full ml-4"
                            >
                        </div>
                    </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-600 text-center">No tienes notificaciones no leídas.</p>
            @endif
        </div>
        
        <div class="mb-1 p-1 bg-gray-100 border border-gray-400 rounded-lg">
            <h3 class="text-lg font-semibold mb-2 text-center">Historial de notificaciones:</h3>
            @if ($historialNotificaciones->count() > 0)
                <ul class="mb-1 p-1 bg-white border border-white rounded-lg">
                    @foreach ($historialNotificaciones as $historialNotificacion)
                       
                    <li class="mb-1 p-1 bg-white border border-white rounded-lg">
                        <div class="flex items-center">
                            <div class="flex-grow">
                                <h4 class="text-lg font-semibold">{{ $historialNotificacion->data['title'] }}</h4>
                                <p class="text-gray-600">{{ $historialNotificacion->data['message'] }}</p>
                                <a href="{{ $historialNotificacion->data['action_url'] }}" class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-700">{{ $historialNotificacion->data['action_text'] }}</a>
                            </div>
                            <img
                                src="{{asset('perfiles') . '/' . $historialNotificacion->data['user_image'] }}"
                                alt="Imagen usuario" 
                                class="w-10 rounded-full ml-4"
                            >
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="pagination-links mt-4">
                    {{ $historialNotificaciones->links() }}
                </div>
            @else
                <p class="text-gray-600">No tienes historial de notificaciones.</p>
            @endif
        </div>
    </div>
@endsection