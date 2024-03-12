<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class New_TelegramBotController extends Controller
{
    public function handle(Request $request)
    {
        // Отримуємо дані від Телеграма
        $data = $request->all();

        // Перевіряємо, чи містить запит текст повідомлення
        if (isset($data['message']['text'])) {
            // Отримуємо текст повідомлення
            $message = $data['message']['text'];

            // Обробляємо команди
            switch ($message) {
                case '/start':
                    $response = 'Вітаю, бот працює!';
                    break;
                case '/help':
                    $response = 'Доступні команди: /start, /help';
                    break;
                default:
                    $response = 'Невідома команда. Використайте /help, щоб отримати список доступних команд.';
                    break;
            }

            // Відправляємо відповідь на повідомлення
            $this->sendMessage($data['message']['chat']['id'], $response);
        }

        // Повертаємо відповідь на запит для Телеграма
        return response()->json(['status' => 'success']);
    }

    private function sendMessage($chatId, $message)
    {
        // Отримуємо токен бота
        $token = '6825994146:AAET1ztCSlWSKj1gNDDmk9FSemsaZWFpLoU';

        // Формуємо URL для відправки повідомлення
        $url = 'https://api.telegram.org/bot' . $token . '/sendMessage';

        // Відправляємо POST-запит на API Телеграма
        $response = Http::post($url, [
            'chat_id' => $chatId,
            'text' => $message,
        ]);

        // Перевіряємо, чи вдалося відправити повідомлення
        if ($response->successful()) {
            // Повідомлення успішно відправлене
            return true;
        } else {
            // Помилка при відправці повідомлення
            return false;
        }
    }
}
