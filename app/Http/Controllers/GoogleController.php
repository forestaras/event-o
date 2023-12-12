<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{



    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            // Ви можете отримати дані про користувача з $user і виконати потрібні дії, наприклад, створення або авторизацію користувача.

            return redirect()->route('home'); // Перенаправлення після успішної автентифікації.
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Помилка автентифікації через Google.');
        }
    }
}
