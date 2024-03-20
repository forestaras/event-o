<?php

namespace App\Http\Controllers;

use App\Models\Telegram;
use App\Models\Telegram_log;
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
            if ($bot_state === '/name') {
                if (strpos($text, '/') !== true) {
                    $people=Telegram::where('user_id', $chat_id)->where('name', $text)->first();
                    if(!$people){
                        $name = new Telegram();
                        $name->name = $text;
                        $name->username = $user_name;
                        $name->user_id = $chat_id;
                        $name->save();
                        $text_return = $text . " добавлений до списку відстеження. Якщо ви хочете добавити ще когось, перейдіть /name. 📝
                        Переглянути весь список відстеження можна тут /list_name. 👀";
                    }
                    else{
                        $text_return = $text . " вже є у списку для відстеження. Якщо ви хочете добавити ще когось, перейдіть /name. 📝
                        Переглянути весь список відстеження можна тут /list_name. 👀";
                    }
                }
            }
            if ($bot_state == '/delet') {
                if (strpos($text, '/') !== true) {
                    $rezult = Telegram::where('user_id', $chat_id)->where('name', $text)->delete();
                    if ($rezult) {
                        $text_return = "✅ Ви успішно видалили $text зі свого списку відстеження.
                        Якщо ви бажаєте видалити ще когось зі списку, скористайтеся командою /delet.

                        📋 Для перегляду повного списку відстеження використовуйте команду /list_name.";
                    } else {
                        $text_return = "У вас не було такого імені у списку";
                    }
                }
            }
            // $text_return = "Вкажіть імя яке ви хочете видалити зі списку";

            file_put_contents('telegram_bot/users/' . $chat_id . '.txt', "2222");
        }
        switch ($text) {
            case '/start':
                $text_return = "Привіт, $first_name $last_name! Ласкаво просимо до бота Event_O! 🤖✨
                Ці команди доступні для використання:                                  
                /name - додати нове ім'я до списку відстеження ➕👤
                /list_name - переглянути весь список відстеження 👥📋   
                /help - отримати список доступних команд 📚❓
                /delet - видалити ім'я зі списку відстеження🗑️👤

                📚 Опис: Event_O - це телеграм-бот, створений для відстеження результатів подій і змагань. Він допомагає користувачам бути в курсі оновлень та отримувати актуальну інформацію про учасників та їх досягнення.
                💡 Функціонал: Бот дозволяє додавати імена учасників до списку відстежування, отримувати повідомлення про їх результати та місце в змаганнях. Крім того, ви можете переглянути список всіх відстежуваних імен і зручно керувати списком відстежування.                             
                Бажаємо вам приємного користування ботом Event_O та успіхів у всіх вашіх подіях! 🎉🌟";
                break;
            case '/help':
                $text_return = "Привіт, $first_name $last_name! Я - бот Event_O, який створений для відстеження результатів подій і змагань. Дозвольте мені розповісти вам про доступні команди:
                
                /name - ця команда дозволяє вам додати нове ім'я до списку відстежування. Я буду відслідковувати результати для вказаної особи і повідомляти вас про їх оновлення. 📝✅
                
                /list_name - використовуйте цю команду, щоб переглянути повний список імен, які я відстежую. Ви зможете побачити всі додані імена і бути в курсі їх результатів. 📋👀

                /delet - видалю учасник зі списку відстеження і більше не повідомлятиму вас про його результати. 🗑️😊
       
                /help - ця команда надасть вам повний список доступних команд і короткий опис їх функціоналу. Ви зможете легко ознайомитися з можливостями бота. 😊📚
                                    
                Не соромтеся використовувати ці команди для отримання необхідної інформації та керування списком відстежування.
                                    
                Я завжди тут, щоб допомогти вам з будь-якими запитаннями або потребою в додатковій підтримці. Звертайтесь до бота Event_O і отримуйте зручну інформацію про ваші улюблені події! 😊🤖";
                break;
            case '/name':

                $text_return = " 🧑‍💻Для того щоб додати спортсмена, за яким ви хочете слідкувати, просто напишіть його прізвище та ім'я, наприклад: Шевченко Тарас.";

                break;

            case '/delet':
                $text_return = "  🗑️ Якщо ви бажаєте видалити учасника зі списку, просто вкажіть його прізвище ім'я, наприклад: Шевченко Тарас.";
                break;
            case '/all_delet':

                $text_return = "Ви впевнені, що хочете видалити усіх спортсменів зі свого списку?

                🗑️ Ця дія призведе до повного видалення всіх спортсменів, які ви додали до списку відстеження. Усі їхні результати та інформація будуть втрачені.
                
                Якщо ви певні у своєму рішенні, виберіть одну з наступних опцій:
                
                /yes_delet_all - підтвердити видалення усіх спортсменів.
                /no_delet_all - відмінити видалення та залишити спискок без змін.
                ❗️ Зверніть увагу, що ця дія необоротна і не може бути скасована. Переконайтеся, що ви дійсно бажаєте видалити всіх спортсменів зі свого списку.
                
                Якщо у вас виникли питання або потрібна додаткова допомога, використовуйте команду /help. 🤔💡";
                break;
            case '/list_name':
                $peoples=Telegram::where('user_id', $chat_id)->get();
                $list_name=self::list_name($peoples);
                $text_return = " 🧑‍💻Ви слідкуєте за:$list_name";
                break;
        }


        file_put_contents('telegram_bot/users/' . $chat_id . '.txt', $text);
        return $text_return;
    }


    static function get_bot_state($chat_id)
    {
        if (file_exists('telegram_bot/users/' . $chat_id . '.txt')) {
            $data = file_get_contents('telegram_bot/users/' . $chat_id . '.txt');
            // $data = substr($data, 0, 6);
            return $data;
        } else {
            return '';
        }
    }
    static function list_name($peoples){
        $list_name=" ";
        foreach ($peoples as $people) {
            $list_name="$list_name 
            ($people->name)";
        }
        return $list_name;

    }


    static function create_log($name, $id, $event_id, $rt, $st, $stat)
    {
        $telegram = new Telegram_log();
        $telegram->name = $name;
        $telegram->rt = $rt;
        $telegram->st = $st;
        $telegram->user_id = $id;
        $telegram->event_id = $event_id;
        $telegram->stat = $stat;
        $telegram->save();
    }

    static function edit_log($id, $name , $rt, $st, $stat){
        $telegram = Telegram_log::find($id);
        $telegram->name = $name;
        $telegram->rt = $rt;
        $telegram->st = $st;
        // $telegram->user_id = $user_id;
        // $telegram->event_id = $event_id;
        $telegram->stat = $stat;
        $telegram->save();
    }
}
