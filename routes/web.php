<?php

use App\Models\User;
use Google\Service\ServiceControl\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/github-auth', function () {
    return Socialite::driver('github')->redirect();
});
Route::get('/github-auth/callback',[LoginController::class,'authCallbackGit']);


Route::get('/google-auth', function () {
    return Socialite::driver('google')->redirect();
});
Route::get('/google-auth/callback',[LoginController::class, 'handleGoogleCallback']);

Route::view('/', 'login')->name('login');
Route::view('/registro', 'register')->name('registro');
Route::view('/privada', 'secret')->middleware('auth')->name('privada');


Route::post("/validar-registro",[LoginController::class, 'register']) -> name('validar-registro');
Route::post("/inicia-sesion",[LoginController::class, 'login']) -> name('inicia-sesion');
Route::get("/logout",[LoginController::class, 'logout']) -> name('logout');


 