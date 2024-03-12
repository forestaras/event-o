<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class New_TelegramBotController extends Controller
{
    public function handle(Request $request)
    {
        // Отримуємо дані від Телеграма
        $data = $request->all();
        // $data = "Дані для запису в файл\n";
        file_put_contents("message.txt", $data);

        // Перевіряємо, чи містить запит текст повідомлення
        // if (isset($data['message']['text'])) {
        //     // Отримуємо текст повідомлення
        //     $message = $data['message']['text'];

        //     // Обробляємо команди
        //     switch ($message) {
        //         case '/start':
        //             $response = 'Вітаю, бот працює!';
        //             break;
        //         case '/help':
        //             $response = 'Доступні команди: /start, /help';
        //             break;
        //         default:
        //             $response = 'Невідома команда. Використайте /help, щоб отримати список доступних команд.';
        //             break;
        //     }

        //     // Відправляємо відповідь на повідомлення
        //     $this->sendMessage($data['message']['chat']['id'], $response);
        // }

        // Повертаємо відповідь на запит для Телеграма
        return response()->json(['status' => 'success']);
    }


}
