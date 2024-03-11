<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class New_TelegramBotController extends Controller
{
    public function telegram(Request $request)
    {
        // Отримуємо вхідні дані від Телеграма
        $update = $request->all();

        // Перевіряємо, чи є текст повідомлення
        if (isset($update['message']['text'])) {
            $command = $update['message']['text'];

            // Обробляємо команду
            switch ($command) {
                case '/start':
                    $response = 'Ви викликали команду /start.';
                    break;
                case '/help':
                    $response = 'Ви викликали команду /help.';
                    break;
                default:
                    $response = 'Невідома команда. Використайте /start або /help.';
                    break;
            }

            // Відправляємо відповідь на команду
            $this->sendMessage($update['message']['chat']['id'], $response);
        }

        // Повертаємо відповідь для Телеграма
        return response()->json(['status' => 'success']);
    }

    private function sendMessage($chatId, $message)
    {
        // Ваш код для відправки повідомлення в Телеграм
        $telegramBotToken = 'YOUR_TELEGRAM_BOT_TOKEN';
        $url = 'https://api.telegram.org/bot' . $telegramBotToken . '/sendMessage?' . http_build_query([
            'chat_id' => $chatId,
            'text' => $message,
        ]);

        // Надсилаємо запит на URL
        $response = file_get_contents($url);

        // Виводимо результат
        var_dump($response);
    }

    public function setWebhook()
    {
        $telegramBotToken = '6947389463:AAEFdsijx_I9B1v6f4BJW2sUSVOiYYDmo2I';
        $webhookUrl = 'https://event-o.net/';

        // Встановлюємо веб-хук для бота
        $url = 'https://api.telegram.org/bot' . $telegramBotToken . '/setWebhook?url=' . $webhookUrl;

        // Відправляємо запит на встановлення веб-хука
        $response = file_get_contents($url);

        // Виводимо результат
        var_dump($response);
    }
}
