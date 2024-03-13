<?php

namespace App\Http\Controllers;

use App\Models\Mopclass;
use App\Models\Mopcompetition;
use Illuminate\Http\Request;
use App\Models\Mopcompetitor;
use App\Models\Moporganization;
use App\Models\Telegram;
use App\Models\Telegram_log;
use App\Http\Middleware\VerifyCsrfToken;

class TelegramController extends Controller
{

    public function telegram(Request $request)
    {

        $bot_token = '6825994146:AAET1ztCSlWSKj1gNDDmk9FSemsaZWFpLoU'; // токен вашего бота
        $data = $request->getContent(); // весь ввод перенаправляем в $data
        $data = json_decode($data, true); // декодируем json-закодированные-текстовые данные в PHP-массив


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
            echo "ddd";
        }

        return message_to_telegram($bot_token, 74117538, 'ddfdf', $reply_markup = 'sss');
    }




































    static function sendMessage($chatID, $messaggio, $token)
    {
        $stat = $_GET['stat'];
        $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
        $url = $url . "&text=" . urlencode($messaggio);
        $ch = curl_init();
        $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    // name','user_id','time','updated_at', 'created_at'];
    static function create($name, $user_id, $event_id, $time)
    {
        $log = new Telegram_log();
        $log->name = $name;
        $log->user_id = $user_id;
        $log->event_id = $event_id;
        $log->rt = $time;
        $log->save();
    }


    // public function search()
    // {

    //     $token = '2107045715:AAFH4DLnTFuxLCTxZ17FGLj0hHCbNbAbOm8';
    //     date_default_timezone_set('Europe/Kiev');
    //     $currentDateTime = date('Y-m-d H:i:s'); // Поточна дата і час
    //     $timestamp = date('Y-m-d H:i:s', strtotime('-30 minutes ', strtotime($currentDateTime))); // Відняти 30 хвилин від часу
    //     // echo $timestamp;
    //     $peopless = Mopcompetitor::where('update', '>', $timestamp)->where('rt', '>', 0)->get(); // виймаємо учасників які фінішували 30 хв назад

    //     foreach ($peopless as $people) {
    //         $name[] = $people->name;
    //     }
    //     foreach()
    //     if ($name > 0) {
    //         $telegram = Telegram::whereIn('name', $name)->get(); // створює контакти яким потрібно зробити розсилку
    //     }

    //     foreach ($telegram as $t) { // Відправляє повідомлення
    //         self::sendMessage($t->user_id, $t->name, $token);
    //     }
    // }

    public function search2($event_id)
    {
        $token = '6947389463:AAEFdsijx_I9B1v6f4BJW2sUSVOiYYDmo2I';

        $grups = Mopclass::where('cid', $event_id)->get();
        $event = Mopcompetition::where('cid', $event_id)->first();
        $clubs = Moporganization::where('cid', $event_id)->get();

        $peopless = Mopcompetitor::where('cid', $event_id)->where('rt', '>', 0)->get(); // виймаємо учасників які фінішували 30 хв назад
        $not_log = Telegram_log::where('event_id', $event_id)->get();


        foreach ($peopless as $people)  $name[] = $people->name;

        if ($name > 0) $telegram = Telegram::whereIn('name', $name)->get(); // створює контакти яким потрібно зробити розсилку

        foreach ($telegram as $t) {
            $not = 0;
            $not = $not_log->where('user_id', $t->id)->first();
            // echo $not->id;
            if ($not->id <= 0) {
                $people = $peopless->where('name', $t->name)->first();
                //    $prople->name= $people->name;
                $people->club = self::clubsearh($clubs, $people);
                $people->grup = self::grupsearh($grups, $people);
                $people->rt = self::formatTime($people->rt);
                $people->st = self::formatTime($people->st);
                $people->rez = self::rez_stat($people);
                $people->mistse = self::mistse($people, $peopless);

                //    echo  $mistse."/".$name."/". $club."/". $grup."/".  $rt."/".  $st."/". $rez."</br>";
                //    $messaggio=  $mistse."/".$name."/". $club."/". $grup."/".  $rt."/".  $st."/". $rez."</br>";
                $messeg = "«" . $people->name . ",  вітаємо на фініші змагань: «" . $event->name . "» 💪
           Твій результат: " .  $people->rez . " поточне " . $people->mistse . ", місце у групі " .  $people->grup . "
           Слідкуй за результатами Online👇
           https://event-o.net/livess/show/" . $event_id;


                self::create($t->name, $t->id, $event_id, $people->rt + $people->stat);
                self::sendMessage($t->user_id, $messeg, $token);
            }
        }

        return view('live.telegram.telegram_online', compact('people'));
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
