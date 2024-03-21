<?php

namespace App\Http\Controllers;

use App\Http\Middleware\VerifyCsrfToken;
use App\Models\Mopcompetition;
use App\Models\Mopcompetitor;
use App\Models\Telegram;
use App\Models\Telegram_log;
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
        $text_message = New_Telegramt_messageController::messge_to_telegram($data);
        // $text_message = 'Будь ласка, введіть своє ім\'я:';
        // $reply_markup = ['keyboard' => [[['text' => 'Скасувати']]], 'resize_keyboard' => true];
        self::message_to_telegram($chat_id, $text_message, $reply_markup = '');
    }

    public function rezult($cid)
    {

        $peoples = New_EventController::people_telegram($cid);
        $event = Mopcompetition::where('cid', $cid)->first();
        $name = $peoples->pluck('name');
        $telegram_log = Telegram_log::where('event_id', $cid)->get();
        // foreach ($peoples as $people)  $name[] = $people->name;
        if ($name > 0) $telegram = Telegram::whereIn('name', $name)->get(); // імена яким потріно відропавити результати
        foreach ($telegram as $t) {
            $rezult = $peoples->where('name', $t->name)->first();

            $telegram_lo = $telegram_log->where('user_id', $t->id)->first();

            if ($rezult->rt != $telegram_lo->rt) {
                $text_message =
                    $rezult->name . ", вітаємо на фініші змагань: " . $event->name . " 💪
            Твій результат  " . $rezult->rezult_stat . " поточне " . $rezult->plases . ", місце у групі " . $rezult->class_name . "
            Слідкуй за результами Online👇
            https://event-o.net/livess/rezult/" . $cid . "#" . $rezult->class_name . " 
            
            Бажаємо подальших успіхів! 🏆";
                if ($telegram_lo->rt > 0) {
                    New_Telegramt_messageController::edit_log($telegram_lo->id, $t->name, $rezult->rt, $rezult->st, $rezult->stat);
                } elseif ($telegram_lo->name==Null) {
                    New_Telegramt_messageController::create_log($t->name, $t->id, $cid,  $rezult->rt, $rezult->st, $rezult->stat);
                }
                self::message_to_telegram($t->user_id, $text_message, $reply_markup = '');
            }



            elseif ($rezult->st != $telegram_lo->st and $rezult->rt == 0) {

                if ($rezult->si != 0) {
                    $si = "( і компас з чіпом" . $rezult->si . " не забудь😉)";
                }
                $text_message =
                    "🚀🚀🚀«" . $rezult->name . ", вітаємо на змаганнях: «" . $event->name . "» 🚀
            Тобі присвоєно стартову хвилину: " . $rezult->start . "До зустрічі у стартовому коридорі😊." . $si . "
            Бажаю вдалої дистанції💪

            Усі протоколи  старту, а також  результати Online тут👇
            https://event-o.net/livess/rezult/" . $cid . "#" . $rezult->class_name ." 🚀🚀🚀";
                if ($telegram_lo->st > 0) {
                    New_Telegramt_messageController::edit_log($telegram_lo->id, $t->name, $rezult->rt, $rezult->st, $rezult->stat);
                } elseif (!$telegram_lo->st) {
                    New_Telegramt_messageController::create_log($t->name, $t->id, $cid,  $rezult->rt, $rezult->st, $rezult->stat);
                }
                self::message_to_telegram($t->user_id, $text_message, $reply_markup = '');
            }
        }
    }

    public function curl($cid)
    {
        // $url = "http://example.com";
        $ch = curl_init();

        // Задаємо параметри запиту
        curl_setopt($ch, CURLOPT_URL, "https://event-o.net/api/telegram/rez/" . $cid);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Виконуємо запит
        $response = curl_exec($ch);

        // Закриваємо curl-сесію
        curl_close($ch);

        // return response()->json(['message' => 'URL opened successfully']);

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
