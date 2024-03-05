<?php

namespace App\Http\Controllers;

use App\Models\Mopclass;
use App\Models\Mopcompetitor;
use App\Models\Moporganization;
use Illuminate\Http\Request;
use App\Http\Controllers\New_FunctionController;
use App\Models\Protocol;
use Illuminate\Support\Facades\DB;

class New_EventController extends Controller
{
    // club_name - назва клуба
    // club_name_small - коротка назва клуба
    // class_name - назва групи
    // status - статус
    // start - стартова хвилина
    // rezult - результат
    // rezult_stat - статус і результат обєднано
    // plases - місце
    // sort_plases - місце для сортування
    // bali - бали учасників всіх (робиться зразу для всіх учасників)
    // club_summball_peoples - сима балів клубу (робиться зразу для всього клубу) + учасники клубу 
    // class_peoples - група + учасники групи
    static function people_all_event($id)
    {
        $peoples = Mopcompetitor::where('cid', $id)->get();
        $class = Mopclass::where('cid', $id)->get();
        $organization = Moporganization::where('cid', $id)->get();
        foreach ($peoples as $people) {
           $people->club_name=New_FunctionController::club_name($organization,$people);
           $people->club_name_small=mb_substr($people->clyb_name, 0, 10, 'UTF-8') . '...';
           $people->class_name=New_FunctionController::class_name($class,$people);
           $people->status=New_FunctionController::status($people);
           $people->start=New_FunctionController::formatTime($people->st);
           $people->rezult=New_FunctionController::formatTime($people->rt);
           $people->rezult_stat=New_FunctionController::rezult_stat($people);
           $people->plases=New_FunctionController::plases($people, $peoples);
           $people->sort_plases=New_FunctionController::sort_plases($people->stat, $people->plases);
           

           
           
        }
        $peoples=$peoples->sortBy('sort_plases');
       
        // dd($peoples);
        return $peoples;
    }

    static function protocol_people($cid)
    {
        $peoples=New_FunctionController::protocol($cid);
        foreach ($peoples as $people) {
           $people->club_name_small=mb_substr($people->club_name, 0, 10, 'UTF-8') . '...';
           $people->status=New_FunctionController::status($people);
           $people->start=New_FunctionController::formatTime($people->st);
           $people->rezult=New_FunctionController::formatTime($people->rt);
           $people->rezult_stat=New_FunctionController::rezult_stat($people);
           $people->plases=New_FunctionController::plases($people, $peoples);
           $people->sort_plases=New_FunctionController::sort_plases($people->stat, $people->plases);
        }
        $peoples=$peoples->sortBy('sort_plases');
        
       
        // dd($peoples);
        return $peoples;
    }

    public function protocol_comand($cid){
        $peoples=self::protocol_people($cid);
        $protocol_dani = Protocol::find($cid);
        $peoples_bali=New_FunctionController::bali($peoples,$protocol_dani->formula);
        $clubs = New_FunctionController::club_summball_peoples($peoples,$protocol_dani);
        $clubs=$clubs->sortByDesc('sumball');
        return view('live.protocol.protocol_comand', compact('clubs','protocol_dani'));
    }

    public function protocol_finish($cid){
        $protocol_dani=Protocol::find($cid);
        $peoples=self::protocol_people($cid);
        $peoples= New_FunctionController::roz($peoples);
        $class_peoples= New_RozryadController::rozryad($peoples,$protocol_dani);
        // $class_peoples = New_FunctionController::class_peoples($peoples_rozriad);
        return view('live.protocol.protocol_finish', compact('class_peoples','protocol_dani'));
    }

    public function protocol_start($cid){
        $peoples=self::people_all_event($cid);
        $peoples=$peoples->sortBy('st');
        $class_peoples = New_FunctionController::class_peoples($peoples);
        return view('live.protocol.protocol_start', compact('class_peoples'));
    }

    public function protocol_raley($cid){
        $teams = DB::table('mopteam')->where('cid', $cid)->get();
		$teammembers = DB::table('mopteammember')->where('cid', $cid)->get(); 
        $peoples=self::people_all_event($cid);
        $class=$teams->unique('cls');
        foreach ($peoples as $people) {          
            $people->etap=$teammembers->where('rid',$people->id)->first()->leg;
            $people->tid=$teammembers->where('rid',$people->id)->first()->id;
            $people->rez_etap=New_FunctionController::formatTime($people->it);
        }
        $peoples=$peoples->sortBy('etap');
        foreach ($teams as $team) {
            $team->count_people=$peoples->where('tid',$team->id)->count();
            $team->peoples=$peoples->where('tid',$team->id);
            $team->plases=New_FunctionController::plases($team, $teams);
            $team->sort_plases=New_FunctionController::sort_plases($team->stat, $team->plases);
            $team->rez_stat_team=New_FunctionController::rezult_stat($team);
        }
        $teams=$teams->sortBy('sort_plases');
        foreach ($class as $clas) {
            $clas->teams=$teams->where('cls',$clas->cls);
        }
        return view('live.protocol.protocol_raley', compact('class'));
    }


}
