<?php

namespace App\Http\Controllers;

use App\Models\Event;
use CRUDBooster;
use App\Models\Mopclass;
use App\Models\Mopcompetition;
use App\Models\Mopcompetitor;
use App\Models\Mopcontrol;
use App\Models\Moporganization;
use App\Models\Mopradio;
use App\Models\Online;
use App\Models\Reclam;
use Illuminate\Http\Request;

class LiveRezultsController extends Controller
{


    public function online()
    {



        return view('live.online', compact('events'));
    }
    public function all_event()
    {
        $d = date('Y-m-d');
        $events = Mopcompetition::get()->sortByDesc('date');
        $events->count = Mopcompetition::get()->count();
        foreach ($events as $event) {
            $event->online=Online::where('id',$event->cid)->first();
            $event->name = mb_strimwidth($event->name, 0, 30, "..."); 
            if ($event->date > $d) {
                $event->color = 'badge-info';
                $event->status = 'Відбудеться';
            } elseif ($event->date == $d) {
                $event->color = 'badge-warning';
                $event->status = 'Онлайн';
            } elseif ($event->date < $d) {
                $event->color = 'badge-success';
                $event->status = 'Відбулося';
            }
        }
        return view('live.all_event', compact('events'));
    }

    public function show_event($id)
    {
        $event = Mopcompetition::where('cid', $id)->first();
        $rez = Mopcompetitor::where('cid', $id)->get()->sortByDesc('timestamp');
        if ($rez->count()>0) {
        $split = Mopcontrol::where('cid', $id)->get()->sortByDesc('id');
        $split_count =  $split->count();
        $time_max = $rez->max('timestamp');
        $time_now = Date('Y-m-d H:i:s', strtotime('+2 hours'));
        $count_all = $rez->count();
        $count_finish = $rez->where('stat', '>', 0)->count();
        $prots = 100 / $count_all * $count_finish;  
        }
        $seting = Online::where('id', $id)->first();
        $event->seting=$seting;
        $event->count_all=$count_all;
        $event->count_rez=$rez->where('stat',1)->count();
        $event->club=Moporganization::where('cid', $id)->get()->count();

        
        

        if ($time_now < $time_max) {
            $event->live = 'ОНЛАЙН';
        }
        if ($prots > 80) {
            $event->rez = 'результати';
        }

        if ($split_count > 4) {
            $event->split = 'Спліти';
        }
        if ($split_count > 4) {
            $event->com_rez = '1';
        }


        // dd($count_finish);

        return view('live.show_event', compact('event'));
    }






    public function live($id, $cls)
    {
        $event = Mopcompetition::where('cid', $id)->first();
        $grups = Mopclass::where('cid', $id)->get();
        $name_grup = Mopclass::where('cid', $id)->where('id', $cls)->first()->name;
        $cid = $id;
        $cls = $cls;

        return view('live.online', compact('cid', 'cls', 'grups', 'name_grup', 'event'));
    }






    static function seting()
    {
        $seting = SetingController::seting();

        return $seting;
    }

    static function dani()
    {
        $dani = collect(
            [
                'all_event' => Mopcompetition::get()->count(),
                'week_event' => self::week_event()->count(),
                'dey_event' => self::day_event()->count(),
                'all_people' => Mopcompetitor::get()->count(),

            ]
        );
        // dd($dani);
        return $dani;
    }

    static function reclam()
    {
        $reclams = Reclam::where('activ', '>', 0)->where('partneri',NULL)->where('data_finish', '>=', date('Y-m-d'))->paginate(3)->sortBy('prioritet');
        return $reclams;
    }

    static function week_event()
    {
        $date1 = date('Y-m-d', strtotime("+14 day"));
        $date2 = date('Y-m-d');

        $events = Mopcompetition::where('date', '<', $date1)->where('date', '>=', $date2)->paginate(3)->sortByDesc('date');
        // foreach($events as $event){
        //     $event
        // }
        return $events;
    }

    static function day_event()
    {
        $date1 = date('Y-m-d', strtotime("+1 day"));
        $date2 = date('Y-m-d');

        $events = Mopcompetition::where('date', '<', $date1)->where('date', '>=', $date2)->paginate(3)->sortByDesc('date');
        // foreach($events as $event){
        //     $event
        // }
        return $events;
    }



    //////////




    static function time_format_rez_stat($rt, $stat)
    { // Виводить результат або статус в форматі H:i:s
        switch ($stat) {
            case 0:
                return " "; //Unknown, running?
            case 1:
                return date('H:i:s', $rt / 10);
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
        };
    }

    static function time_format_rez_timer($date, $st)
    { // пертворює стартовий час в формат m d, Y H:i:s для таймера
        $fate_timer = date('m d, Y H:i:s', $date + $st / 10);
        return $fate_timer;
    }

    static function time_format_start($st)
    {
        return date('H:i:s', $st / 10);
    }

    static function vidst_obj($obj)
    {
        $best_rez = $obj->where('stat', 1)->min('rt');
        $vidst = $obj->where('stat', 1);
        foreach ($vidst as $ss) {
            $ss->vidst = date('+i:s', ($ss->rt - $best_rez) / 10);
        }
        return $vidst;
    }

    static function mistse_obj($obj)
    {
        $x = 0;
        $mistse = $obj->where('stat', 1)->sortBy('rt');
        foreach ($mistse as $ss) {
            $x = $x + 1;
            $ss->mistse = $x;
        }
        return $mistse;
    }

    static function pozition_sort_obj($obj, $date)
    {
        $mistse1 = $obj->where('stat', 1)->sortBy('rt');
        $mistse2 = $obj->where('stat', '>', 1)->sortBy('rt');
        $mistse3 = $obj->where('stat', 0)->sortBy('rt');
        foreach ($mistse1 as $ss) {
            $ss->sort = $ss->rt / 10;
        }
        foreach ($mistse2 as $ss) {
            $ss->sort = $ss->stat + 100000;
        }
        foreach ($mistse3 as $ss) {
            $naw_time = date("U") + 7200;
            // $naw_tmestamp=date_format(date_create($naw_time), 'U');
            $fate_timer = $date + $ss->st / 10;
            // print_r($fate_timer);
            // print_r($naw_time);
            $ss->sort = $naw_time - $fate_timer;
        }
        $mistse_obj = $mistse1->merge($mistse2)->merge($mistse3);
        return $mistse_obj->sortBy('sort');
    }

    static function color($timeshtamp)
    {
        $date_naw = date('U') + 7200;
        $dara_fin = date_format(date_create($timeshtamp), 'U') - 3600;
        $riz = $date_naw - $dara_fin;
        // echo $date_naw.'-'.$dara_fin.'='.$riz.'///';
        if ($riz < 30) {
            $color = 'bg-warning';
        }
        return $color;
    }

    //Віджети

    static function widget_partneri()
    {
        $partneri = Reclam::where('activ', '>', 0)->where('partneri', '>', 0)->where('data_finish', '>=', date('Y-m-d'))->paginate(3)->sortBy('prioritet');
        return $partneri;

    }

    static function widget_rezult($id)
    {
        $grups = Mopclass::where('cid', $id)->get();

        return $grups;
    }

    // static function widget_split($id)
    // {
    //     $grups = Mopclass::where('cid', $id)->get();
    //     $peopless = Mopcompetitor::where('cid', $id)->get()->sortByDesc('timestamp');
    //     foreach ($. as $key => $value) {
    //         # code...
    //     }

    //     return $grups;
    // }

    

    static function widget_comand($id)
    {
        $event = Moporganization::where('cid', $id)->first();
        $online = Online::where('id',$id)->first();
		$eventseting=Event::where('id',$online->eventid)->first();
        $peopless = Mopcompetitor::where('cid', $id)->get();
        $grups = Mopclass::where('cid', $id)->get();
        $clubs = Moporganization::where('cid', $id)->get();
        $clubs_count = $clubs->count();
        $zalik=$online->cill;
		$formula=$online->rezult_formula_ball;
        foreach ($grups as $grup) {
            $grup->best = $peopless->where('cls', $grup->id)->where('cls', $grup->id)->where('stat', 1)->min('rt');
        }
        foreach ($peopless as $people) {
            if ($people->stat == 1) { 

                $bestrt = $grups->where('id', $people->cls)->first->best;
                $people->mistse = RezultController::mistse($people, $peopless);
                if ($formula=='Б=100*(Чп/Чу)') {
					$bali = 100 * ($bestrt->best / $people->rt);
				}
                if ($formula == 'Пліч о пліч') {
					if ($people->mistse==1) $bali = 100;
					if ($people->mistse==2) $bali = 95;
					if ($people->mistse==3) $bali = 90;
					if ($people->mistse==4) $bali = 85;
					if ($people->mistse>=5 and $people->mistse<=88) $bali = 89-$people->mistse;			
				}
                $people->bali = $bali;
                $people->best = $bestrt->best;
            }
        }
        $y = 0;
        foreach ($clubs as $club) {
            $x = 0;
            $people = $peopless->where('org', $club->id)->sortByDesc('bali')->take($zalik);
            foreach ($people as $p) {
                $x = $p->bali + $x;
            }
            $club->sumball = round($x, 2);
            $club->all = $clubs->count();
        }
        $clubs = $clubs->sortByDesc('sumball');
        $club_max_bal = $clubs->max('sumball');
        $clubs = $clubs->take(4);
        $mistse = 0;
        foreach ($clubs as $club) {
            $mistse = $mistse + 1;
            $club->mistse = $mistse;
            $club->bal_vits = 90 / $club_max_bal * $club->sumball;
        }
        $clubs['all'] = $clubs_count;
        return $clubs;
    }

    static function start_cloks($id)
    {
        $event = Moporganization::where('cid', $id)->first();
        $peopless = Mopcompetitor::where('cid', $id)->get();
        $grups = Mopclass::where('cid', $id)->get();
        $clubs = Moporganization::where('cid', $id)->get();
        $clubs_count = $clubs->count();
        foreach ($grups as $grup) {
            $grup->best = $peopless->where('cls', $grup->id)->where('cls', $grup->id)->where('stat', 1)->min('rt');
        }
        foreach ($peopless as $people) {
            if ($people->stat == 1) { 
                $bestrt = $grups->where('id', $people->cls)->first->best;
                $bali = 100 * ($bestrt->best / $people->rt);
                $people->bali = $bali;
                $people->best = $bestrt->best;
            }
        }
        $y = 0;
        foreach ($clubs as $club) {
            $x = 0;
            $people = $peopless->where('org', $club->id)->sortByDesc('bali')->take(10);
            foreach ($people as $p) {
                $x = $p->bali + $x;
            }
            $club->sumball = round($x, 2);
            $club->all = $clubs->count();
        }
        $clubs = $clubs->sortByDesc('sumball');
        $club_max_bal = $clubs->max('sumball');
        $clubs = $clubs->take(4);
        $mistse = 0;
        foreach ($clubs as $club) {
            $mistse = $mistse + 1;
            $club->mistse = $mistse;
            $club->bal_vits = 90 / $club_max_bal * $club->sumball;
        }
        $clubs['all'] = $clubs_count;
        return $clubs;
    }
}
