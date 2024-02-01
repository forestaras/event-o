<?php

namespace App\Http\Controllers;

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

    

}
