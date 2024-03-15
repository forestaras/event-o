<?php

namespace App\Http\Controllers;

use App\Http\Middleware\VerifyCsrfToken;
use App\Models\Mopcompetitor;
use App\Models\Telegram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class New_TelegramBotController extends Controller
{

    public function handle(Request $request)
    {
         // токен вашего бота
        $data = $request->getContent(); // весь ввод перенаправляем в $data
        $data = json_decode($data, true); // декодируем json-закодированные-текстовые данные в PHP-массив

        if (!empty($data['message']['text'])) {
            $chat_id = $data['message']['from']['id'];
            $user_name = $data['message']['from']['username'];
            $first_name = $data['message']['from']['first_name'];
            $last_name = $data['message']['from']['last_name'];
            $text = trim($data['message']['text']);
            $text_array = explode(" ", $text);         
        }
        $text_message=New_Telegramt_messageController::messge_to_telegram($data);
        // $text_message = 'Будь ласка, введіть своє ім\'я:';
        // $reply_markup = ['keyboard' => [[['text' => 'Скасувати']]], 'resize_keyboard' => true];
        self::message_to_telegram($chat_id, $text_message, $reply_markup = '');


    }

    public function rezult($cid){
        $peoples = Mopcompetitor::where('cid', $cid)->where('rt', '>', 0)->get();
        foreach ($peoples as $people)  $name[] = $people->name;
        if ($name > 0) $telegram = Telegram::whereIn('name', $name)->get();// імена яким потріно відропавити результати
        foreach ($telegram as $t) {
            $rezult=$peoples->where('name',$t->name);
            $text_message="Хтось ваш $rezult";
            self::message_to_telegram($t->user_id, $text_message, $reply_markup = '');
        }
        
    }
    
    static function message_to_telegram($chat_id, $text, $reply_markup = '')
    {
        $keyboard = [
            'inline_keyboard' => [
                [
                    // ['text' => 'Введіть пароль', 'callback_data' => 'enter_password']
                ]
            ]
        ];
        // $reply_markup = ['keyboard' => [[['text' => 'Скасувати']]], 'resize_keyboard' => true];
        $bot_token = '6825994146:AAET1ztCSlWSKj1gNDDmk9FSemsaZWFpLoU';
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
                'reply_markup' => json_encode($keyboard),
            ]
        ];

        curl_setopt_array($ch, $ch_post);
        curl_exec($ch);
    }
   

}
