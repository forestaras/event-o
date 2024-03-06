<?php

namespace App\Http\Controllers;

use App\Models\Peoples;
use App\Models\Protocol;
use App\Models\Register;
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
				return "КЧ"; // Overtime
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
			if ($peoples->cls == $people->cls and $people->stat == 1 and $peoples->stat == 1 and $peoples->rt == $people->rt) {
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
				return 99999990; // Overtime
			case 99:
				return 99999996; //Not participating;
		}
	}


	static function rezult_stat($people)
	{ //поєднує результат і статус
		if ($people->stat == 1) {
			return self::formatTime($people->rt);
		}
		if ($people->stat == 6) {
			return self::status($people) . self::formatTime($people->rt);
		} else return self::status($people);
	}

	static function bali($peoples, $formula)
	{
		$class = $peoples->unique('class_name');
		if ($formula == "Б=100*(Чп/Чу)") {
			foreach ($class as $grup) {
				$grup->best = $peoples->where('class_name', $grup->class_name)->where('stat', 1)->min('rt');
			}
			foreach ($peoples as $people) {
				if ($people->stat == 1) {
					$bestrt = $class->where('class_name', $people->class_name)->first->best;
					$bali = 100 * ($bestrt->best / $people->rt);
					$people->bali = round($bali, 2);
					$people->best = $bestrt->best;
				}
			}
			// $peoples=$peoples->sortBy('bali');

			return $peoples;
		}
		if ($formula == 'Пліч о пліч') {
			foreach ($peoples as $people) {
				if ($people->stat == 1) {
					if ($people->plases == 1) $people->bali = 100;
					if ($people->plases == 2) $people->bali = 95;
					if ($people->plases == 3) $people->bali = 90;
					if ($people->plases == 4) $people->bali = 85;
					if ($people->plases >= 5 and $people->plases <= 88) $people->bali = 89 - $people->plases;
				}
			}
			// $peoples=$peoples->sortBy('bali');
			return $peoples;
		}
		else{
			foreach ($peoples as $people) {
				
				 $people->bali = 0;
					
				
			}
			// $peoples=$peoples->sortBy('bali');
			return $peoples;
		}
	}

	static function club_summball_peoples($peoples,$protocol)
	{
		$kom_count=$protocol->kom_count;
		$kom_count_views=$protocol->kom_count_views;
		// $peoples = self::bali($peoples);
		$clubs = $peoples->unique('club_name');
		$peoples = $peoples->sortBy('sort_plases');
		foreach ($clubs as $club) {
			$club->sumball = $peoples->where('club_name', $club->club_name)->take($kom_count)->sum('bali');
			if ($kom_count_views==1) {		
				$club->peoples = $peoples->where('club_name', $club->club_name)->take($kom_count);
			}
			else{
				$club->peoples = $peoples->where('club_name', $club->club_name);

			}
			$x=0;
			foreach ($club->peoples as $people){
				$x++;
				$people->club_sort=$x;
			}
			$club->count_people=$x;
		}
		return $clubs;
	}

	static function class_peoples($peoples)
	{
		// $peoples=New_FunctionController::bali($peoples);
		$class = $peoples->unique('class_name');
		foreach ($class as $clas) {
			$clas->peoples = $peoples->where('class_name', $clas->class_name);
		}
		$class = $class->sortBy('class_name');
		return $class;
	}

	static function roz($peoples)
	{
		foreach ($peoples as $people) {
			if (!$people->roz) {

				$people->roz = Peoples::where('name', $people->name)->first()->roz;
			}
		}
		return $peoples;
	}

	static function time_sec($time)
	{
		return $time = strtotime($time) * 10;
	}

	function status_protocol($status, $mistse)
	{
		if (substr_count($status, 'Кон') > 0) {
			return  6;
		}
		if ($mistse > 0) {
			return 1;
		}
		switch ($status) {
			case 'DNS':
				return 20;
				break;
			case 'DSQ':
				return 5;
				break;
			case 'DNF':
				return 4;
				break;
			case 'пп.2.6.10':
				return 5;
				break;
			default:
				return 20;
		}
	}

	static function protocol($protocol_id)
	{
		$protocol = Protocol::find($protocol_id);
		//////
		$ryd = explode('/!/', $protocol->prot);
		$div = array_map('trim', explode(';', $ryd[0]));
		foreach ($ryd as $ry) {
			if ($ry) {
				$list = array_map('trim', explode(";", $ry));
				if ($list[0] != 'mistse') {
					$lists[] = array_combine($div, $list);
				}
			}
		}
		$all_rezult = collect(self::bject($lists));
		/////
		foreach ($all_rezult as $people_rezult) {
			if ($protocol->dani == 1) {
				if (!$people_rezult->trener) {
					$people_rezult->trener = Register::where('name', $people_rezult->name)->where('trener', '!=', '0')->first()->trener;
				}
				if (!$people_rezult->roz) {
					$people_rezult->roz = Register::where('name', $people_rezult->name)->where('roz', '!=', '0')->first()->roz;
				}
				if (!$people_rezult->club) {
					$people_rezult->club = Register::where('name', $people_rezult->name)->where('club', '!=', '0')->first()->club;
				}
				if (!$people_rezult->rik) {
					$people_rezult->rik = Register::where('name', $people_rezult->name)->where('rik', '!=', '0')->first()->rik;
				}
			}

			$people_rezult->class_name = $people_rezult->grup;
			$people_rezult->cls = $people_rezult->grup;
			$people_rezult->club_name = $people_rezult->comanda;
			$people_rezult->name = $people_rezult->name;
			$people_rezult->stat = self::status_protocol($people_rezult->status, $people_rezult->mistse);
			$people_rezult->st = self::time_sec($people_rezult->start);
			$people_rezult->rt = self::time_sec($people_rezult->finish) - self::time_sec($people_rezult->start);
			if (!$people_rezult->roz) {
				$people_rezult->roz = 'б/р'; //присвоює бр в кого нема розряду 
			}
			$con = strtotime($protocol->con) - strtotime('00:00:00');
			// $time=self::time_sec('01:00:00')/10-$people_rezult->st/10;
			// dd($time);
			if ($con * 10 < $people_rezult->rt) {
				$people_rezult->stat = 6;
			}
		}
		// dd($all_rezult);
		return $all_rezult;
	}

	function bject($Array)
	{ //Функція що перетворює в обєет

		// Create new stdClass object
		$object = app()->make('stdClass');

		// Use loop to convert array into
		// stdClass object
		foreach ($Array as $key => $value) {
			if (is_array($value)) {
				$value = self::bject($value);
			}
			$object->$key = $value;
		}
		return $object;
	}
	

}
