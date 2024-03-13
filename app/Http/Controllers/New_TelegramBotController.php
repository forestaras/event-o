<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class New_TelegramBotController extends Controller
{
    public function handle(Request $request)
    {
        $bot_token = '6825994146:AAET1ztCSlWSKj1gNDDmk9FSemsaZWFpLoU'; // токен вашего бота
        $data = $request->getContent(); // весь ввод перенаправляем в $data
        $data = json_decode($data, true); // декодируем json-закодированные-текстовые данные в PHP-массив
        
        $order_chat_id = '123456789';  //chat_id менеджера компании для заявок
        $bot_state = ''; // состояние бота, по-умолчанию пустое
        
        // Для отладки, добавим запись полученных декодированных данных в файл message.txt, 
        // который можно смотреть и понимать, что происходит при запросе к боту
        // Позже, когда все будет работать закомментируйте эту строку:
        // file_put_contents(__DIR__ . '/message.txt', print_r($data, true));
        
        // Основной код: получаем сообщение, что юзер отправил боту и 
        // заполняем переменные для дальнейшего использования
        if (!empty($data['message']['text'])) {
            $chat_id = $data['message']['from']['id'];
            $user_name = $data['message']['from']['username'];
            $first_name = $data['message']['from']['first_name'];
            $last_name = $data['message']['from']['last_name'];
            $text = trim($data['message']['text']);
            $text_array = explode(" ", $text);
        
            // получим текущее состояние бота, если оно есть
            $bot_state = get_bot_state ($chat_id);
            
            
        
        
        
        
        // $text_return = "Ви додали, $text, до слідкування за результатами: 
        //     /help - список команд
        //     /about - о нас
        //     /order - оставить заявку
        //     ";
        
        // message_to_telegram($bot_token, $order_chat_id, $text_return);
        // set_bot_state ($chat_id, ''); // не забудем почистить состояние на пустоту, после отправки заявки
        
            
            
            
        
            // если текущее состояние бота отправка заявки, то отправим заявку менеджеру компании на $order_chat_id
            if (substr($bot_state, 0, 6) == '/order') {
                
                $text_return = "
        Заявка от @$user_name:
        Имя: $first_name $last_name 
        $text
        ";
                message_to_telegram($bot_token, $order_chat_id, $text_return);
                set_bot_state ($chat_id, ''); // не забудем почистить состояние на пустоту, после отправки заявки
            }
            // если состояние бота пустое -- то обычные запросы
            else {
            
                // вывод информации Помощь
                if ($text == '/help') {
                    $text_return = "Привет, $first_name $last_name, вот команды, что я понимаю: 
            /help - список команд
            /about - о нас
            /order - оставить заявку
            ";
                    message_to_telegram($bot_token, $chat_id, $text_return);
                    set_bot_state ($chat_id, '/help');
                }
                
                // вывод информации о нас
                elseif ($text == '/about') {
                    $text_return = "verysimple_bot:
            Я пример самого простого бота для телеграм, написанного на простом PHP.
            Мой код можно скачивать, дополнять, исправлять. Код доступен в этой статье:
            https://www.novelsite.ru/kak-sozdat-prostogo-bota-dlya-telegram-na-php.html
            ";
                    message_to_telegram($bot_token, $chat_id, $text_return);
                    set_bot_state ($chat_id, '/about');
                }
                
                // переход в режим Заявки
                elseif ($text == '/order') {
                    
        
        
        
                    $text_return = "$first_name $last_name, для подтверждения Заявки введите текст вашей заявки и нажмите отправить. 
        Наши специалисты свяжутся с вами в ближайшее время!
        ";
                    message_to_telegram($bot_token, $chat_id, $text_return);
                    set_bot_state ($chat_id, '/order');
                }
            }
        }
        
        // функция отправки сообщения от бота в диалог с юзером
        function message_to_telegram($bot_token, $chat_id, $text, $reply_markup = '')
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
        
        // сохранить состояние бота для пользователя
        function set_bot_state ($chat_id, $data)
        {
            file_put_contents(__DIR__ . '/users/'.$chat_id.'.txt', $data);
        }
        
        // получить текущее состояние бота для пользователя
        function get_bot_state ($chat_id)
        {
            if (file_exists(__DIR__ . '/users/'.$chat_id.'.txt')) {
                $data = file_get_contents(__DIR__ . '/users/'.$chat_id.'.txt');
                return $data;
            }
            else {
                return '';
            }
        }
    }


}
