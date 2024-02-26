<?php

namespace App\Http\Controllers;

use App\Models\Peoples;
use Illuminate\Http\Request;

class New_FunctionController extends Controller
{
	static function club_name($clubs, $people)
	{ //Шукає клуб в базі даних з групами
		foreach ($clubs as $cluba) {
			if ($cluba->id == $people->org) $club = $cluba->name;
		}
		return $club;
	}

	static function class_name($grups, $people)
	{ //Шукає рупу в базі даних з групами
		foreach ($grups as $grupa) {
			if ($grupa->id == $people->cls) $grup = $grupa->name;
		}
		return $grup;
	}

	static function status($people)
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

	static function plases($people, $peopless)
	{ //визначає просто місуце
		foreach ($peopless as $peoples) {
			if ($peoples->cls == $people->cls and $people->stat == 1 and $peoples->stat == 1 and $peoples->rt < $people->rt) {
				$x = $x + 1;
			}
			if($peoples->cls == $people->cls and $people->stat == 1 and $peoples->stat == 1 and $peoples->rt == $people->rt){
				$x = $x;
			}
		}
		if ($people->stat != 1) {
			return $x = ' ';
		} else return $x + 1;
	}

	static function sort_plases($status, $mistse)
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

	static function rezult_stat($people)
	{//поєднує результат і статус
		if ($people->stat == 1) {
			return self::formatTime($people->rt);
		} else return self::status($people);
	} 

	static function bali($peoples){
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
		return $peoples;
	}

	static function club_summball_peoples($peoples){
		$peoples=self::bali($peoples);
		$clubs = $peoples->unique('club_name');
        $peoples=$peoples->sortBy('sort_plases');
        foreach ($clubs as $club) {
            $club->sumball=$peoples->where('club_name',$club->club_name)->take(10)->sum('bali');
            $club->peoples=$peoples->where('club_name',$club->club_name);
        }
		return $clubs;

	}

	static function class_peoples($peoples){
		$peoples=New_FunctionController::bali($peoples);
		$class= $peoples->unique('class_name');
        foreach ($class as $clas) {
            $clas->peoples=$peoples->where('class_name',$clas->class_name);
        }
        $class=$class->sortBy('class_name');
		return $class;
	}

	static function roz($peoples){
		foreach ($peoples as $people){
			$people->roz=Peoples::where('name',$people->name)->first()->roz;
		}
		return $peoples;
	}





}
