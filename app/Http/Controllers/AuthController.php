<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Jetstream;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirect($metode)
    {
        return Socialite::driver($metode)->redirect();
    }

    public function callback($metode)
    {
        $user = Socialite::driver($metode)->stateless()->user();

        $name = $user->getName(); // Obtener el nombre predeterminado

        // Verificar el proveedor de autenticación y ajustar el nombre según corresponda
        if ($metode === 'github') {
            $name = $user->getNickname();
        }

        $user = User::firstOrCreate([
            'email' => $user->getEmail(),
        ], [
            'name' => $name,
            'profile_photo_path' => $user->getAvatar(),
        ]);

        auth()->login($user);

        return redirect()->to('/landing');
    }

}
