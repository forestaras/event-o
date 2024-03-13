<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class New_Telegramt_messageController extends Controller
{
    static function messge_to_telegram($data)
    {
        if (!empty($data['message']['text'])) {
            $chat_id = $data['message']['from']['id'];
            $user_name = $data['message']['from']['username'];
            $first_name = $data['message']['from']['first_name'];
            $last_name = $data['message']['from']['last_name'];
            $text = trim($data['message']['text']);
            $text_array = explode(" ", $text);
            $bot_state = self::get_bot_state($chat_id);
        }
        if ($bot_state) {
            if ($bot_state == '/name') {
                $text_return = "Імя" . $text . "Було збережно";
            }
            if ($bot_state == '/dele') {
                $text_return = "Вкажіть імя яке ви хочете видалити зі списку";
            }
        } else {
            switch ($text) {
                case '/help':
                    $text_return = "Доступні команди /name для добавлення імя до відслідковування
                    /delet_name видалення
                    /all_name перегляд всіх імен які відслідковуються";

                    break;

                case '/info':
                    $text_return = "Вкажіть імя яке ви хочете відслідковувати ";
                    break;

                case '/sta':
                case '/name':
                    $text_return = "Введіть імя яке ви хочете зберегти";
                    break;

                default:
                    $text_return = $text;
                    break;
            }
        }

        file_put_contents('telegram_bot/users/' . $chat_id . '.txt', $text);
        return $text_return;
    }

    static function get_bot_state($chat_id)
    {
        if (file_exists('telegram_bot/users/' . $chat_id . '.txt')) {
            $data = file_get_contents('telegram_bot/users/' . $chat_id . '.txt');
            $data = substr($data, 0, 5);
            return $data;
        } else {
            return '';
        }
    }
}
