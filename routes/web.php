<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('principal');
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store']);

Route::post('/logout', [InicioController::class,'logout'])->name('logout');

Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);

Route::fallback(function () {
    return view('errors.404');
});

Route::middleware('auth')->group(function () {
    Route::get('/inicio/{user:username}', [InicioController::class, 'index'])->name('inicio');
    Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('editar.perfil');
    Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');

    // Ruta para buscar perfiles (POST)
    Route::post('/buscar', [PerfilController::class, 'buscar'])->name('perfiles.buscar');

    //Rutas para las publicaciones
    // Route::get('/publicaciones/{user}',[PublicacionController::class,'index']);
    Route::get('/{user:username}/publicaciones/{publicacion}', [PublicacionController::class, 'show'])->name('publicacion.show');
    Route::get('/publicaciones/crear/',[PublicacionController::class,'create'])->name('publicacion.crear');
    Route::post('/publicaciones/crear/',[PublicacionController::class,'store']);
});

