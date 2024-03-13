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
        }
        switch ($text) {
            case '/name':
                $text_return = "Вкажіть імя яке ви хочете відслідковувати ";

                break;
            case '/start':
                $text_return = "sjdhfbsjhdfbjdshbfk";
                break;
            case '/help':
                $text_return = "Привет, $first_name $last_name, вот команды, что я понимаю: 
        /help - список команд
        /about - о нас
        /order - оставить заявку
        ";
                break;
            case '/about':
                $text_return = "verysimple_bot:
        Я пример самого простого бота для телеграм, написанного на простом PHP.
        Мой код можно скачивать, дополнять, исправлять. Код доступен в этой статье:
        https://www.novelsite.ru/kak-sozdat-prostogo-bota-dlya-telegram-na-php";
                break;
            case '/order':
                $text_return = "$first_name $last_name, для подтверждения Заявки введите текст вашей заявки и нажмите отправить. 
                    Наши специалисты свяжутся с вами в ближайшее время!
                    ";
                break;
            default:
            $text_return = "$first_name $last_name, Натисніть старт щоб розпочати /start
            ";
        break;
        }
        
        file_put_contents(__DIR__ . '/users/' . $chat_id . '.txt', $text);
        return $text_return;
    }

}
