<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mopclass;
use App\Models\Mopcompetition;
use App\Models\Mopcompetitor;
use App\Models\Moporganization;
use App\Models\Online;
use App\Models\Telegram;
use App\Models\Telegram_log;

class TelegramController extends Controller
{
    public function message(Request $request)
    {
        Telegram_log::info($request->all());
        $site_dir = dirname(dirname(__FILE__)) . '/'; // корень сайта
        $data = file_get_contents('php://input'); // весь ввод перенаправляем в $data
        $data = json_decode($data, true); // декодируем json-закодированные-текстовые данные в PHP-массив
        $bot_token = '2107045715:AAFH4DLnTFuxLCTxZ17FGLj0hHCbNbAbOm8'; // токен вашего бота
        file_put_contents(__DIR__ . '/message.txt', print_r($data, true));
        if (!empty($request->message['text'])) {
            $chat_id = $request->message['from']['id'];
            $user_name = $request->message['from']['username'];
            $first_name = $request->message['from']['first_name'];
            $last_name = $request->message['from']['last_name'];
            $text = trim($request->message['text']);
            $text_array = explode(" ", $text);
            $bot_state = self::get_bot_state($chat_id);

            if (substr($bot_state, 0, 6) == '/name') { // если текущее состояние бота отправка заявки, то отправим заявку менеджеру компании на $order_chat_id
                $text_return = 
$text . " добавлений до списку відстеження. Якщо ви хочете добавити ще когось, перейдіть /name. 📝
Переглянути весь список відстеження можна тут /list_name. 👀

За допомогою команди /name ви можете додавати нові імена до списку відстежування. Це дозволить боту Event_O надсилати вам повідомлення з результатами та оновленнями про обрані учасники або події. Вам не потрібно пропускати жодну важливу подію або досягнення, оскільки бот буде стежити за вами. 🚀

Не соромтеся додавати більше імен до списку відстежування. Це безпечний спосіб бути в курсі всього, що вас цікавить. Просто введіть ім'я учасника та надішліть його боту, і він додасть його до списку. 😊

Не забудьте переглянути список відстежування за допомогою команди /list_name. Ви зможете побачити всіх доданих учасників або події і впевнитися, що ваш список актуальний. 👥

Якщо ви маєте які-небудь питання, використовуйте команду /help, щоб отримати додаткову допомогу. 🤔💡";


                self::message_to_telegram($bot_token, $chat_id, $text_return);
                self::add_name_table($user_name, $text, $chat_id);
                self::set_bot_state($chat_id, '/help'); // не забудем почистить состояние на пустоту, после отправки заявки
            } 
            
            
            elseif (substr($bot_state, 0, 6) == '/delet') {
                $text_return = "
✅ Ви успішно видалили $text зі свого списку відстеження.

Якщо ви бажаєте видалити ще когось зі списку, скористайтеся командою /delet.

📋 Для перегляду повного списку відстеження використовуйте команду /list_name.

🤔 Потрібна допомога або додаткова інформація? Використовуйте команду /help. 😊👍";
                self::message_to_telegram($bot_token, $chat_id, $text_return);
                Telegram::where('name', $text)->where('user_id', $chat_id)->delete();
                self::set_bot_state($chat_id, '/help'); // не забудем почистить состояние на пустоту, после отправки заявки
            } 
            
            
            
            elseif (substr($bot_state, 0, 10) == '/all_delet') {
                $text_return = "
✅ Ви успішно видалили всіх спортсменів зі свого списку.

Тепер ваш список відстеження порожній. Якщо ви бажаєте додати нову людину до списку, скористайтеся командою /name.

📝 Введіть Прізвище Ім'я, яке ви хочете додати до списку, та відправте повідомлення.

📋 Переглянути весь список відстеження можна командою /list_name.

🤔 Потрібна допомога або додаткова інформація? Використовуйте команду /help. 😊👍";
                self::message_to_telegram($bot_token, $chat_id, $text_return);
                Telegram::where('user_id', $chat_id)->delete();
                self::set_bot_state($chat_id, '/help'); // не забудем почистить состояние на пустоту, после отправки заявки
            } 
            
            
            
            else {
                if ($text == '/start') {
                    $text_return = "
Привіт, $first_name $last_name! Ласкаво просимо до бота Event_O! 🤖✨

Ці команди доступні для використання:
                    
/help - отримати список доступних команд 📚❓
/about - дізнатися більше про бота Event_O ℹ️🤖
/name - додати нове ім'я до списку відстеження ➕👤
/list_name - переглянути весь список відстеження 👥📋
                    
Запам'ятайте, бот Event_O завжди готовий допомогти вам з отриманням актуальної інформації щодо подій та результатів. 📝💡
                    
Якщо у вас є будь-які запитання або потреба в додатковій підтримці, не соромтеся звертатися до мене. 😊👋
                    
Бажаємо вам приємного користування ботом Event_O та успіхів у всіх вашіх подіях! 🎉🌟";
                    self::message_to_telegram($bot_token, $chat_id, $text_return);
                    self::set_bot_state($chat_id, '/help');
                } 
                
                
                
                elseif ($text == '/about') {
                    $text_return = "
🤖 Назва: Event_O
📚 Опис: Event_O - це телеграм-бот, створений для відстеження результатів подій і змагань. Він допомагає користувачам бути в курсі оновлень та отримувати актуальну інформацію про учасників та їх досягнення.
💡 Функціонал: Бот дозволяє додавати імена учасників до списку відстежування, отримувати повідомлення про їх результати та місце в змаганнях. Крім того, ви можете переглянути список всіх відстежуваних імен і зручно керувати списком відстежування.
✅ Команди:
/help - отримати список команд та їх опис.
/name - додати нове ім'я до списку відстежування.
/list_name - переглянути список відстежуваних імен.

Не соромтеся використовувати бота Event_O для відстеження результатів та отримання актуальної інформації про ваші улюблені події. Якщо у вас виникнуть запитання, звертайтеся до бота - я завжди готовий допомогти вам! 🤗🏆";
                    self::message_to_telegram($bot_token, $chat_id, $text_return);
                    self::set_bot_state($chat_id, '/about');
                } 
                
                
                
                
                elseif ($text == '/help') {
                    $text_return = "
Привіт, $first_name $last_name! Я - бот Event_O, який створений для відстеження результатів подій і змагань. Дозвольте мені розповісти вам про доступні команди:

/help - ця команда надасть вам повний список доступних команд і короткий опис їх функціоналу. Ви зможете легко ознайомитися з можливостями бота. 😊📚
                    
/about - ця команда дозволить вам отримати огляд про бота Event_O. Ви дізнаєтесь про його призначення, основні функції та те, як я можу бути вам корисним. 🤖💡
                    
/name - ця команда дозволяє вам додати нове ім'я до списку відстежування. Я буду відслідковувати результати для вказаної особи і повідомляти вас про їх оновлення. 📝✅
                    
/list_name - використовуйте цю команду, щоб переглянути повний список імен, які я відстежую. Ви зможете побачити всі додані імена і бути в курсі їх результатів. 📋👀
                    
Не соромтеся використовувати ці команди для отримання необхідної інформації та керування списком відстежування.
                    
Я завжди тут, щоб допомогти вам з будь-якими запитаннями або потребою в додатковій підтримці. Звертайтесь до бота Event_O і отримуйте зручну інформацію про ваші улюблені події! 😊🤖";
                    self::message_to_telegram($bot_token, $chat_id, $text_return);
                    self::set_bot_state($chat_id, '/about');
                } 
                
                
                
                
                elseif ($text == '/name') {
                    $text_return = "
$first_name $last_name, для того щоб додати імена, за якими ви хочете слідкувати, просто напишіть 'Прізвище Імя' і відправте повідомлення. 📝

Наприклад, якщо ви хочете додати учасника з іменем Іван Петров, просто напишіть 'Петров Іван' і надішліть його боту. 🧑‍💻

Бот Event_O буде відстежувати це ім'я і повідомляти вас про будь-які оновлення або результати, пов'язані з цим учасником. Ви можете додавати багато імен, які вас цікавлять. Не забудьте, що ви завжди можете переглянути список відстежування за допомогою команди /list_name. 👥

Якщо у вас виникли питання або вам потрібна додаткова допомога, скористайтеся командою /help. 🤔💡

Насолоджуйтесь використанням боту Event_O і отримуйте актуальну інформацію про ваші улюблені події та учасників! 🚀✨";
                    self::message_to_telegram($bot_token, $chat_id, $text_return);
                    self::set_bot_state($chat_id, '/name');
                } 
                
                
                
                
                elseif ($text == '/list_name') {
                    $spisocs = Telegram::where('user_id', $chat_id)->get();
                    $count = $spisocs->count();
                    $spis = " ";
                    foreach ($spisocs as $spisoc) {
                        $spis = "$spis ($spisoc->name)";
                    }
                   $text_return = "
У вашому списку зараз знаходиться $count людини: 

$spis

Щоб видалити когось зі списку, натисніть /delet.

Якщо ви бажаєте очистити весь список, скористайтесь командою /all_delet.

👥 Ви можете додавати або видаляти учасників у будь-який час, щоб забезпечити актуальність вашого списку відстежування. Додавайте своїх улюблених учасників і залишайтесь в курсі їхніх результатів та подій! 🏃‍♀️💨

Якщо у вас виникли питання або потрібна додаткова допомога, використовуйте команду /help. 🤔💡

Використовуйте бота Event_O з задоволенням та насолоджуйтесь актуальною інформацією про ваші улюблені події та учасників! 🚀✨";
                    self::message_to_telegram($bot_token, $chat_id, $text_return);
                    self::set_bot_state($chat_id, '/list_name');
                } 
                
                
                
                
                elseif ($text == '/delet') {
                    $text_return = "
Введіть прізвище та ім'я, яке ви хочете видалити зі списку, і надішліть повідомлення.

🗑️ Якщо ви бажаєте видалити учасника зі списку, просто вкажіть його повне ім'я, наприклад: Прізвище Ім'я.

📝 Якщо у вас є багато учасників у списку, можете послідовно видаляти їх одного за одним. Ви можете видаляти бажану кількість учасників за один раз.

❗️ Зверніть увагу, що видалення учасника зі списку призведе до відсутності відстеження його результатів та подій.

Якщо у вас виникли питання або потрібна додаткова допомога, використовуйте команду /help. 🤔💡";
                    self::message_to_telegram($bot_token, $chat_id, $text_return);
                    self::set_bot_state($chat_id, '/delet');
                } 
                
                
                
                
                elseif ($text == '/all_delet') {
                    $text_return = "
Ви впевнені, що хочете видалити усіх спортсменів зі свого списку?

🗑️ Ця дія призведе до повного видалення всіх спортсменів, які ви додали до списку відстеження. Усі їхні результати та інформація будуть втрачені.

Якщо ви певні у своєму рішенні, виберіть одну з наступних опцій:

/yes_delet_all - підтвердити видалення усіх спортсменів.
/no_delet_all - відмінити видалення та залишити спискок без змін.
❗️ Зверніть увагу, що ця дія необоротна і не може бути скасована. Переконайтеся, що ви дійсно бажаєте видалити всіх спортсменів зі свого списку.

Якщо у вас виникли питання або потрібна додаткова допомога, використовуйте команду /help. 🤔💡";
                    self::message_to_telegram($bot_token, $chat_id, $text_return);
                    self::set_bot_state($chat_id, '/all_delet');
                }
            }
        }
    }


    public function search2($event_id, $pass, $time, $status)
    {
        $online = Online::where('id', $event_id)->first();
        if ($online->cod == $pass) {
            $dani['stat'] = $status;
            $dani['pass'] = $pass;
            $dani['id'] = $event_id;
            $dani['time'] = $time;


            $token = '2107045715:AAFH4DLnTFuxLCTxZ17FGLj0hHCbNbAbOm8';

            $grups = Mopclass::where('cid', $event_id)->get();
            $event = Mopcompetition::where('cid', $event_id)->first();
            $clubs = Moporganization::where('cid', $event_id)->get();

            
            if ($status=='start') {
                $peopless = Mopcompetitor::where('cid', $event_id)->where('st', '>', 0)->get(); // виймаємо учасників які фінішували 30 хв назад
            }
            if ($status=='go') {
                $peopless = Mopcompetitor::where('cid', $event_id)->where('rt', '>', 0)->get(); // виймаємо учасників які фінішували 30 хв назад
            }
            $telegram_log = Telegram_log::where('event_id', $event_id)->get();
            if ($status=='stop') {
                $peopless = Mopcompetitor::where('cid', $event_id)->get(); // виймаємо учасників які фінішували 30 хв назад
            }
            $telegram_log = Telegram_log::where('event_id', $event_id)->get();



            foreach ($peopless as $people)  $name[] = $people->name;
            if ($name > 0) $telegram = Telegram::whereIn('name', $name)->get(); // створює контакти яким потрібно зробити розсилку
            // dd($telegram);
            if (!is_object($telegram)) {
                return 'Поки немає жлдного результату або стартової тому запустть онлайн результтати в меос';
            }
            foreach ($telegram as $t) {
                $not = 0;
                $telegram_lo =  $telegram_log->where('user_id', $t->id)->where('stat', $status)->first();
                // echo $not->id;

                $people = $peopless->where('name', $t->name)->first();
                $t->name = $people->name;
                $t->club = self::clubsearh($clubs, $people);
                $t->grup = self::grupsearh($grups, $people);
                $t->rt = self::formatTime($people->rt);
                $t->st = self::formatTime($people->st);
                $t->rez = self::rez_stat($people);
                $t->mistse = self::mistse($people, $peopless);
                $t->created_at =  $telegram_log->where('name', $people->name)->first()->created_at;
                $rt=$people->rt + $people->stat;
                $st=$people->st + $people->stat;
                // echo $st."-"; 
                // echo $telegram_lo->st."/"; 


                if ($telegram_lo->stat != 'start' and $st != $telegram_lo->st and $status=='start') {
                    if ($t->si!=0) {
                        $si="( і компас з чіпом" . $t->si . " не забудь😉)";
                    }
                  $messeg = "
                  🚀🚀🚀«" . $t->name . ", вітаємо на змаганнях: «" . $event->name . "» 🚀
Тобі присвоєно стартову хвилину: " . $t->start_time . "До зустрічі у стартовому коридорі😊.".$si."
Бажаю вдалої дистанції💪

Усі протоколи  старту, а також  результати Online тут👇
https://event-o.net/livess/show/ " . $event_id." 🚀🚀🚀" ;

                    self::create_log($t->name, $t->id, $event_id,  $rt, $st, $status);
                    self::message_to_telegram($token, $t->user_id, $messeg);
                } 



                elseif ($telegram_lo->stat == 'start' and $st != $telegram_lo->st and $status=='start') {
                    if ($t->si!=0) {
                        $si="( і компас з чіпом" . $t->si . " не забудь😉)";
                    }
                  $messeg = "
                  🚀🚀🚀«" . $t->name . ", вітаємо на змаганнях: «" . $event->name . "» 🚀
Тобі присвоєно стартову хвилину: " . $t->start_time . "До зустрічі у стартовому коридорі😊.".$si."
Бажаю вдалої дистанції💪

Усі протоколи  старту, а також  результати Online тут👇
https://event-o.net/livess/show/ " . $event_id." 🚀🚀🚀" ;

                    self::edit_log($telegram_lo->id, $t->name , $rt, $st, $status);
                    self::message_to_telegram($token, $t->user_id, $messeg);
                } 



                elseif(  $telegram_lo->stat != 'go' and $rt != $telegram_lo->rt and $status=='go' ) {
                   $messeg = "
🏁🏁🏁«" . $t->name . ", вітаємо на фініші змагань: «" . $event->name . "» 💪
Твій результат: " . $t->rez . " поточне " . $t->mistse . ", місце у групі " . $t->grup . "
Слідкуй за результатами Online👇
https://event-o.net/livess/show/" . $event_id . "

Бажаємо подальших успіхів! 🏆🏁🏁🏁";

                    self::create_log($t->name, $t->id, $event_id, $rt, $st, $status);
                    self::message_to_telegram($token, $t->user_id, $messeg);
                }




                elseif (  $telegram_lo->stat == 'go'  and $rt != $telegram_lo->rt and $status=='go' ) {
                    $messeg = "
🏁🏁🏁«" . $t->name . ", вітаємо на фініші змагань: «" . $t->event->name . "» 💪
Твій результат оновлено: " . $t->rez . " поточне " . $t->mistse . ", місце у групі " . $t->grup . "
Слідкуй за результами Online👇
https://event-o.net/livess/show/" . $event_id . "

Бажаємо подальших успіхів! 🏆🏁🏁🏁";

                    self::edit_log($telegram_lo->id, $t->name , $rt, $st, $status);
                    self::message_to_telegram($token, $t->user_id, $messeg);
                }
            }
            // dd($telegram);
            $telegram = $telegram->sortByDesc('created_at');


            return view('live.telegram.telegram_online', compact('telegram', 'dani'));
        } else {
            echo "Пароль не вірний";
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

    // сохранить состояние бота для пользователя
    static function set_bot_state($chat_id, $data)
    {
        file_put_contents(__DIR__ . '/users/' . $chat_id . '.txt', $data);
    }

    // получить текущее состояние бота для пользователя

    static function add_name_table($username, $name, $user_id)
    {
        $names = Telegram::where('user_id', $user_id)->where('name', $name)->first();
        if (!$names and strlen($name) >= 10) {
            $telegram = new Telegram;
            $telegram->username = $username;
            $telegram->name = $name;
            $telegram->user_id = $user_id; // Set the value for the 'd' field
            $telegram->save();
        }
    }




    static function get_bot_state($chat_id)
    {
        if (file_exists(__DIR__ . '/users/' . $chat_id . '.txt')) {
            $data = file_get_contents(__DIR__ . '/users/' . $chat_id . '.txt');
            return $data;
        } else {
            return '';
        }
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
    //Функції
    static function grupsearh($grups, $people)
    { //Шукає рупу в базі даних з групами
        foreach ($grups as $grupa) {
            if ($grupa->id == $people->cls) $grup = $grupa->name;
        }
        return $grup;
    }

    static function clubsearh($clubs, $people)
    { //Шукає клуб в базі даних з групами
        foreach ($clubs as $cluba) {
            if ($cluba->id == $people->org) $club = $cluba->name;
        }
        return $club;
    }

    static function statussearh($people)
    { //Шукає Статус 
        $status = $people->stat;
        switch ($status) {
            case 0:
                return " "; //Unknown, running?
            case 1:
                return "OK";
            case 20:
                return "DNS"; // Did not start;
            case 21:
                return "CANCEL"; // Cancelled entry;
            case 3:
                return "MP"; // Missing punch
            case 4:
                return "DNF"; //Did not finish
            case 5:
                return "DQ"; // Disqualified
            case 6:
                return "OT"; // Overtime
            case 99:
                return "NP"; //Not participating;
        }
    }

    static function plases($status, $mistse)
    { // місце для правильного сортувння
        switch ($status) {
            case 0:
                return 99999999; //Unknown, running?
            case 1:
                return $mistse;
            case 20:
                return 99999992; // Did not start;
            case 21:
                return 99999995; // Cancelled entry;
            case 3:
                return 99999994; // Missing punch
            case 4:
                return 99999991; //Did not finish
            case 5:
                return 99999993; // Disqualified
            case 6:
                return 99999997; // Overtime
            case 99:
                return 99999996; //Not participating;
        }
    }

    static function formatTime($time)
    { //формат часу
        $time = $time / 10;
        if ($time > 3600)
            return sprintf("%d:%02d:%02d", $time / 3600, ($time / 60) % 60, $time % 60);
        elseif ($time > 0)
            return sprintf("%2d:%02d", ($time / 60) % 60, $time % 60);
        else
            return '0:00';
    }


    static function formatVids($time, $stat)
    { //формат часу відставання
        $time = $time / 10;
        if ($time > 3600 and $stat == 1)
            return sprintf("+%d:%02d:%02d", $time / 3600, ($time / 60) % 60, $time % 60);
        elseif ($time > 0  and $stat == 1)
            return sprintf("+%2d:%02d", ($time / 60) % 60, $time % 60);
        elseif ($stat == 1)
            return 'ЛІДЕР';
    }


    static function rez_stat($people)
    { //зєднрує статус та результат
        if ($people->stat != 1)
            return SiteOnlineController::statussearh($people);
        else
            return SiteOnlineController::formatTime($people->rt);
    }




    static function mistse($people, $peopless)
    { //визначає просто місуце
        foreach ($peopless as $peoples) {
            if ($peoples->cls == $people->cls and $people->stat == 1 and $peoples->stat == 1 and $peoples->rt < $people->rt) {
                $x = $x + 1;
            }
        }
        if ($people->stat != 1) {
            return $x = ' ';
        } else return $x + 1;
    }

    static function count_people($peoples)
    {
    }

    static function count_club($clubs)
    {
        foreach ($clubs as $ckub) {
            $x = $x + 1;
        }
        return $x;
    }

  
}
