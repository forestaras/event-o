<?php

namespace App\Http\Controllers;

use App\Models\Mopclass;
use App\Models\Mopcompetitor;
use App\Models\Moporganization;
use Illuminate\Http\Request;
use App\Http\Controllers\New_FunctionController;


class New_EventController extends Controller
{
    static function people_all_event($id)
    {
        $peoples = Mopcompetitor::where('cid', $id)->get();
        $class = Mopclass::where('cid', $id)->get();
        $organization = Moporganization::where('cid', $id)->get();

        foreach ($peoples as $people) {
           $people->clyb_name=New_FunctionController::club_name($organization,$people);
           $people->clyb_name_small=mb_substr($people->clyb_name, 0, 10, 'UTF-8') . '...';
           $people->class_name=New_FunctionController::class_name($class,$people);
           $people->status=New_FunctionController::status($people);
           $people->start=New_FunctionController::formatTime($people->st);
           $people->rezult=New_FunctionController::formatTime($people->rt);
           $people->plases=New_FunctionController::plases($people, $peoples);
           $people->sort_plases=New_FunctionController::sort_plases($people->stat, $people->plases);
        }
       
        // print_r($peoples);
        return $peoples;
    }

    public function protocol_comand($cid){
        $peoples=self::people_all_event($cid);
        $clubs = $peoples->unique('clyb_name');
        $class = $peoples->unique('class_name');

        foreach ($class as $grup) {
			$grup->best = $peoples->where('class_name', $grup->class_name)->where('stat', 1)->min('rt');
		}
		foreach ($peoples as $people) {
			if ($people->stat == 1) {
				$bestrt = $class->where('class_name', $people->class_name)->first->best;
				$bali = 100 * ($bestrt->best / $people->rt);
				$people->bali = $bali;
				$people->best = $bestrt->best;				
			}
		}
        dd($class);
        // $clubs=Mopclass::where('cid', $cid)->get();


        return view('live.protocol.protocol_comand', compact('peopless','clubs'));

    }
}
