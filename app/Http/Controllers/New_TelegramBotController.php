<?php

namespace App\Http\Controllers;

use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class New_TelegramBotController extends Controller
{

    public function handle(Request $request)
    {
        $bot_token = '6825994146:AAET1ztCSlWSKj1gNDDmk9FSemsaZWFpLoU'; // токен вашего бота
        $data = $request->getContent(); // весь ввод перенаправляем в $data
        $data = json_decode($data, true); // декодируем json-закодированные-текстовые данные в PHP-массив

        if (!empty($data['message']['text'])) {
            $chat_id = $data['message']['from']['id'];
            $user_name = $data['message']['from']['username'];
            $first_name = $data['message']['from']['first_name'];
            $last_name = $data['message']['from']['last_name'];
            $text = trim($data['message']['text']);
            $text_array = explode(" ", $text);

            if ($text == '/help') {
                $text_return = "Привет, $first_name $last_name, вот команды, что я понимаю: 
            /help - список команд
            /about - о нас
            /order - оставить заявку
            ";
                self::message_to_telegram($bot_token, $chat_id, $text_return);
            }

            elseif ($text == '/about') {
                $text_return = "verysimple_bot:
            Я пример самого простого бота для телеграм, написанного на простом PHP.
            Мой код можно скачивать, дополнять, исправлять. Код доступен в этой статье:
            https://www.novelsite.ru/kak-sozdat-prostogo-bota-dlya-telegram-na-php.html
            ";
                self::message_to_telegram($bot_token, $chat_id, $text_return);
            }

            elseif ($text == '/order') {

                $text_return = "$first_name $last_name, для подтверждения Заявки введите текст вашей заявки и нажмите отправить. 
        Наши специалисты свяжутся с вами в ближайшее время!
        ";
                self::message_to_telegram($bot_token, $chat_id, $text_return);
            }
        }

    }
    static function message_to_telegram($bot_token, $chat_id, $text, $reply_markup = '')
    {
        $ch = curl_init();
        $ch_post = [
            CURLOPT_URL => 'https://api.telegram.org/bot' . $bot_token . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => [
                'chat_id' => $chat_id,
                'parse_mode' => 'HTML',
                'text' => $text,
                'reply_markup' => $reply_markup,
            ]
        ];

        curl_setopt_array($ch, $ch_post);
        curl_exec($ch);
    }
}
