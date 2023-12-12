<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $googleUser = Socialite::driver('google')->user();

            // Перевірка, чи користувач вже існує у вашій базі даних за допомогою email
            $user = User::where('email', $googleUser->email)->first();

            if ($user) {
                // Якщо користувач з такою електронною адресою вже існує, аутентифікуємо його
                Auth::login($user);
            } else {
                // Якщо користувача з таким email немає, створюємо нового користувача у базі даних
                $newUser = new User();
                $newUser->name = $googleUser->name;
                $newUser->email = $googleUser->email;
                // Опціонально: можна зберегти інші дані, якщо вони доступні, наприклад, зображення профілю
                // $newUser->img = $googleUser->avatar;
                $newUser->save();

                // Автентифікуємо нового користувача
                Auth::login($newUser);
            }

            return redirect()->route('event'); // Перенаправлення після успішної автентифікації
        } catch (\Exception $e) {
            return redirect()->route('event')->with('error', 'Помилка автентифікації через Google.');
        }
    }
}
