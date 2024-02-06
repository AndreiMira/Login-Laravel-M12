<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rutas de autenticación generadas por Jetstream
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Página de inicio para usuarios autenticados
    Route::view('/landing', 'landing')->name('landing');
});

// Rutas de Socialite
Route::get('/auth/{metode}/redirect', [AuthController::class, 'redirect']);
Route::get('/auth/{metode}/callback', [AuthController::class, 'callback']);

// Rutas de autenticación
Route::post('/', [AuthenticatedSessionController::class, 'store'])->name('login'); // Ruta para procesar el inicio de sesión
Route::view('/registro', 'auth.register')->name('registro'); // Vista para el registro de usuarios

// Ruta para la página de inicio (puedes cambiarla según tus necesidades)
Route::view('/', 'auth.login')->name('root');
