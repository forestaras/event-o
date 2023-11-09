<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Mopclass;
use App\Models\Mopcompetition;
use App\Models\Online;
use App\Models\Register;
use App\Models\Registerseting;

use CRUDBooster;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class SiteEventController extends \crocodicstudio\crudbooster\controllers\CBController
{

    public function dataua($dataevent)
    {
        $m = date_format(date_create($dataevent), 'm');
        $d = date_format(date_create($dataevent), 'd');
        switch ($m) {
            case '01':
                $x = 'січ';
                break;
            case '02':
                $x = 'лют';
                break;
            case '03':
                $x = 'бер';
                break;
            case '04':
                $x = 'кві';
                break;
            case '05':
                $x = 'тра';
                break;
            case '06':
                $x = 'чер';
                break;
            case '07':
                $x = 'лип';
                break;
            case '08':
                $x = 'сер';
                break;
            case '09':
                $x = 'вер';
                break;
            case '10':
                $x = 'жов';
                break;
            case '11':
                $x = 'лис';
                break;
            case '12':
                $x = 'гру';
                break;
        }
        $data = $d . ' ' . $x;
        return $data;
    }



    public function index(Request $request)
    {
        $seting = SetingController::seting();
        Statistic::add();  //для статистики
        $yerstart = date("Y");
        $mountstart = date("m");
        $query = Request('query');
        if ($_GET['yerstart'] != 0) {
            $yerstart = $_GET['yerstart'];
        }
        if ($_GET['datastart'] != 0) {
            $mountstart = $_GET['datastart'];
        }
        if ($query) {
            $events = Event::where('title', 'like', "%$query%")->orderBy('datastart', 'DESC')->get(); // Дані змагання
        }
        elseif ($_GET['filter'] == 'all') {
            $events = Event::where('activ', 1)->orderBy('datastart', 'DESC')->get(); // Дані змагання
        } else {
            $event1 = Event::where('activ', 1)->where('datastart', 'like', $yerstart . '-' . $mountstart . '-' . '%')->orderBy('datastart', 'DESC')->get(); // Дані змагання
            $event2=Event::where('activ', 1)->where('datastart', '<', $yerstart . '-' . $mountstart . '-' . '%')->orderBy('datastart', 'DESC')->take(5)->get(); // Дані 
            $event3=Event::where('activ', 1)->where('datastart', '>', $yerstart . '-' . $mountstart . '-' . '%')->orderBy('datastart', 'DESC')->take(5)->get(); // Дані змагання
        
            $events = $event1->merge($event2)->merge($event3);
        }


        foreach ($events as $event) {
            $event->registersetings = Event::find($event->id)->registerseting;
            $event->online = Event::find($event->id)->online;
            $obl = Event::find($event->id)->obl;
            foreach ($event->online as $eventr) {
                $eventr->rez = Online::find($eventr->id)->mopcompetition;
            }
            $event->data = date_format(date_create($event->datastart), "d.m.Y");
            if ($event->datafinish != 0) {
                $m1 = date_format(date_create($event->datafinish), "m");
                $m2 = date_format(date_create($event->datastart), "m");

                if ($m1 != $m2) {
                    $event->data = date_format(date_create($event->datastart), "d.m-") . date_format(date_create($event->datafinish), "d.m.Y");
                }
                if ($m1 == $m2) {
                    $event->data = date_format(date_create($event->datastart), "d-") . date_format(date_create($event->datafinish), "d.m.Y");
                }
            } else {
                $event->data = date_format(date_create($event->datastart), "d.m.Y");
            }
            $event->obltitle = $obl->title; //Міняємо ід на область
            $event->logoobl = $obl->flag; //Міняємо ід на область
            $event = $events->sortBy('datastart');
        }
        return view('live.page.index', compact('events', 'seting'));
    }

    public function index2()
    {
        $seting = SetingController::seting();
        Statistic::add();  //для статистики
        $yerstart = date("Y");
        $mountstart = date("m");
        if ($_GET['yerstart'] != 0) {
            $yerstart = $_GET['yerstart'];
        }
        if ($_GET['datastart'] != 0) {
            $mountstart = $_GET['datastart'];
        }
        if ($_GET['filter'] == 'all') {
            $events = Event::where('activ', 1)->orderBy('datastart', 'DESC')->get(); // Дані змагання
        } else {
            $events = Event::where('activ', 1)->where('datastart', 'like', $yerstart . '-' . $mountstart . '-' . '%')->orderBy('datastart', 'DESC')->get(); // Дані змагання
        }


        foreach ($events as $event) {
            $event->registersetings = Event::find($event->id)->registerseting;
            $event->online = Event::find($event->id)->online;
            $obl = Event::find($event->id)->obl;
            foreach ($event->online as $eventr) {
                $eventr->rez = Online::find($eventr->id)->mopcompetition;
            }
            $event->data = date_format(date_create($event->datastart), "d.m.Y");
            if ($event->datafinish != 0) {
                $m1 = date_format(date_create($event->datafinish), "m");
                $m2 = date_format(date_create($event->datastart), "m");

                if ($m1 != $m2) {
                    $event->data = date_format(date_create($event->datastart), "d.m-") . date_format(date_create($event->datafinish), "d.m.Y");
                }
                if ($m1 == $m2) {
                    $event->data = date_format(date_create($event->datastart), "d-") . date_format(date_create($event->datafinish), "d.m.Y");
                }
            } else {
                $event->data = date_format(date_create($event->datastart), "d.m.Y");
            }
            $event->obltitle = $obl->title; //Міняємо ід на область
            $event->logoobl = $obl->flag; //Міняємо ід на область
            $event = $events->sortBy('datastart');
        }
        return view('site.tableevent', compact('events', 'seting'));
    }






    public function show($id)
    {
        Statistic::add();
        $seting = SetingController::seting();                    // Настройки меню і назва сайту
        $event = Event::find($id);

        $user=DB::table('cms_users')->where('id',CRUDBooster::myId())->first();	
        $event->datastart = date_format(date_create($event->datastart), 'd.m.Y');   // Дані  
        $event->obl = Event::find($id)->obl;
        $event->club = Event::find($id)->club;
        $event->registersetings = Event::find($event->id)->registerseting; //Дані про реєстрацію
        
        foreach ($event->registersetings as $regid) {
            $regid->count = Registerseting::find($regid->id)->register->count();
            $regid->club=Register::where('eventid',$regid->id)->pluck('club')->unique()->values()->all();
            $regid->grups=explode(" ", $regid->grup);
        }
        $event->link = Event::find($id)->evendop; //Дані про реєстрацію
        $onlines = Event::find($id)->online;
        foreach ($onlines as $online) {
            $online->ooo = DB::table('mopcompetition')->where('cid', $online->id)->first(); //meos competition
            $online->peoples = DB::table('mopcompetitor')->where('cid', $online->id)->get(); //перевіряє чи є стартові
            $online->grups = Mopclass::where('cid', $online->id)->get();
            // $seting = Online::where('id', $id)->first();
            // $online->seting=$seting;
            foreach($online->grups as $grup){ 
                $count_start=$online->peoples->where('cls',$grup->id)->where('st', '>', 0)->count();
                if ($count_start>=1) {
                  $grup->start=1;
                }          
                $count_rezult=$online->peoples->where('cls',$grup->id)->where('rt', '>', 0)->count();
                if ($count_rezult>=1) {
                  $grup->rezult=1;
                }       

                // $count_split=$online->peoples->where('cls',$grup->id)->where('rt', '>', 0)->count();
                // if ($count_rezult>=1) {
                //   $grup->rezult=1;
                // }             
                

            }
            $online->splits = DB::table('mopradio')->where('cid', $online->id)->where('rt', '>', 0)->first(); //перевіряє чи є фінішні
            if ($online->ooo) {
                $rez = 1;
            }
        }
        $event->onlines = $onlines; //Дані про реєстрацію
        $event->rez = $rez; //Дані про результати



        return view('live.page.event_show', compact('event', 'seting'));
    }

    public function show2($id)
    {
        Statistic::add();
        $seting = SetingController::seting();                    // Настройки меню і назва сайту
        $event = Event::find($id);

        // $user=DB::table('cms_users')->where('id',CRUDBooster::myId())->first();	
        $event->datastart = date_format(date_create($event->datastart), 'd.m.Y');   // Дані  
        $event->obl = Event::find($id)->obl;
        $event->club = Event::find($id)->club;
        $event->registersetings = Event::find($event->id)->registerseting; //Дані про реєстрацію
        foreach ($event->registersetings as $regid) {
            $regid->count = Registerseting::find($regid->id)->register->count();
        }
        $event->link = Event::find($id)->evendop; //Дані про реєстрацію
        $onlines = Event::find($id)->online;
        foreach ($onlines as $online) {
            $online->ooo = DB::table('mopcompetition')->where('cid', $online->id)->first(); //meos competition
            $online->startovi = DB::table('mopcompetitor')->where('cid', $online->id)->where('st', '>', 0)->first(); //перевіряє чи є стартові
            $online->split = DB::table('mopradio')->where('cid', $online->id)->where('rt', '>', 0)->first(); //перевіряє чи є фінішні
            if ($online->ooo) {
                $rez = 1;
            }
        }
        $event->onlines = $onlines; //Дані про реєстрацію
        $event->rez = $rez; //Дані про результати



        return view('site.showevent', compact('event', 'seting'));
    }









    public function registerevent($registerid)
    {
        $registerseting = DB::table('registerseting')->where('id', $registerid)->first();
        $registers = DB::table('register')->where('eventid', $registerid)->get();
        $registerseting->grups=explode(' ', $registerseting->grup);
        $registerseting->dnis=explode(' ', $registerseting->dni);
        return view('live.register.register_event', compact( 'registers', 'registerseting'));
    }






    public function register($id, $regid)
    {
        $seting = SetingController::seting();                    // Настройки меню і назва сайту
        $event = DB::table('registerseting')->where('id', $regid)->first();
        return view('site.registreevent', compact('seting', 'event'));
    }
    public function getLogout()
    {

        $me = CRUDBooster::me();
        CRUDBooster::insertLog(trans("crudbooster.log_logout", ['email' => $me->email]));

        Session::flush();

        return redirect()->route('getLogin')->with('message', trans("crudbooster.message_after_logout"));
    }



    public function calendar()
    {
        $seting = SetingController::seting();
        if ($_GET['obl'] > 0) {
            $event = Event::where('oblid', $_GET['obl'])->get();
        } else {
            $event = Event::get();
        }


        $oblsall = DB::table('obl')->get();
        $obltitle = $oblsall->where('id', $_GET['obl'])->first();
        $oblst = Event::get(); // всі змагання
        $obls = $oblst->unique('oblid'); //унікальні значення ід областей
        foreach ($obls as $obl) {
            $obl->title = $oblsall->where('id', $obl->oblid)->first()->title;
            $obl->id = $oblsall->where('id', $obl->oblid)->first()->id;
        }


        foreach ($event as $even) {
            $even->ms = date_format(date_create($even->datastart), 'm') - 1;
            $even->ds = date_format(date_create($even->datastart), 'd');
            $even->ys = date_format(date_create($even->datastart), 'Y');
            $even->obl = $obls->where('id', $even->oblid)->first();
            if ($even->datafinish != 0) {
                $even->mf = date_format(date_create($even->datafinish), 'm') - 1;
                $even->df = date_format(date_create($even->datafinish), 'd');
                $even->yf = date_format(date_create($even->datafinish), 'Y');
            } else {
                $even->mf = $even->ms;
                $even->df = $even->ds;
                $even->yf = $even->ys;
            }
            // dd($obls);

        }

        return view('live.page.calendar', compact('seting', 'event', 'obls', 'obltitle'));
    }
}
