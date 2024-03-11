<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class New_TelegramBotController extends Controller
{
    public function telegram()
    {
        $telegramBotToken = '2107045715:AAFH4DLnTFuxLCTxZ17FGLj0hHCbNbAbOm8';
        $chatId = '741175385'; // Ідентифікатор чату або користувача

        $message = 'Вітаю, це моє перше повідомлення через PHP!';

        // Формуємо URL для виклику методу sendMessage
        $url = 'https://api.telegram.org/bot' . $telegramBotToken . '/sendMessage?' . http_build_query([
            'chat_id' => $chatId,
            'text' => $message,
        ]);

        // Надсилаємо запит на URL
        $response = file_get_contents($url);

        // Виводимо результат
        var_dump($response);
    }
}
