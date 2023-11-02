<?php
include_once "config.php";
include_once "function.php";
// Позже, когда все будет работать закомментируйте эту строку:
file_put_contents(__DIR__ . '/message.txt', print_r($data, true));

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
    $bot_state = get_bot_state($chat_id);

    // если текущее состояние бота отправка заявки, то отправим заявку менеджеру компании на $order_chat_id
    if (substr($bot_state, 0, 6) == '/name') {
        $my_names= all_name_table($chat_id);
        foreach ($my_names as $my_name) {
            $text_return = $my_name['name']." Добавлений до саиску відстеження.Якщо ви хочедобавити ще когось напишіть ще одне Прізвище Імя";
        }
        
        message_to_telegram($bot_token, $chat_id, $text_return);
        add_name_table($user_name, $text, $chat_id);
        set_bot_state($chat_id, '/name'); // не забудем почистить состояние на пустоту, после отправки заявки

    }
    // если состояние бота пустое -- то обычные запросы

    else {

        // вывод информации Помощь
        if ($text == '/start') {
            $text_return = "Привіь, $first_name $last_name, ці команди ти можеш використати: 
    /help - список команд
    /about - про бот
    /name - добавити імя
    ";
            message_to_telegram($bot_token, $chat_id, $text_return);
            set_bot_state($chat_id, '/help');
        }

        // вывод информации о нас
        elseif ($text == '/about') {
            $text_return = "Цей бот створено для відслідквування своїх рехультатів на змаганнях.Для правильної роботи вам потрібно ввести прізвище імя за яким ви хочете слідкувати. Імен може бути одне або декілька.
    ";
            message_to_telegram($bot_token, $chat_id, $text_return);
            set_bot_state($chat_id, '/about');
        } 
        
        elseif ($text == '/help') {
            $text_return = "Привіь, $first_name $last_name, ці команди ти можеш використати: 
    /help - список команд
    /about - про бот
    /name - добавити імя
    ";
            message_to_telegram($bot_token, $chat_id, $text_return);
            set_bot_state($chat_id, '/about');
        }

        // переход в режим Заявки
        elseif ($text == '/name') {
            $text_return = "$first_name $last_name, для того щоб додати імена за якими ви хочете слідкувати просто напишіть 'Прізвище Імя' і відправте повідомлення
";
            message_to_telegram($bot_token, $chat_id, $text_return);
            set_bot_state($chat_id, '/name');
        }
    }
}




