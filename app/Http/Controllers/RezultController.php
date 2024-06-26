<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Mopclass;
use App\Models\Mopcompetition;
use App\Models\Mopcompetitor;
use App\Models\Moporganization;
use App\Models\Mopradio;
use App\Models\Online;
use App\Models\Peoples;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class RezultController extends Controller
{


	public function test()
	{


		// $qr=QrCode::generate('Make me into a QrCode!');
		// $event = Mopcompetition::where('cid', $cid)->first()->people;
		// dd($event);
		return view('live.test');
	}

	public function anna()
	{
		$name = CRUDBooster::myID();
		if ($name == 206) { //206
			return view('live.anna');
		} else {
			$url = url()->current();
			Session::put('url', $url);
			return redirect(route('getLogin'));
		}
	}
	/////////////////////////////////////////////////////////////////

	public function erorrs()
	{

		return view('live.erorrs.erorrs_split');
	}
	//////////////////////////////////////

	public function protocol_start($id)
	{

		return view('live.protocol.protocol_start');
	}

	public function protocol_finish($id)
	{
		$event = Mopcompetition::where('cid', $id)->first();
		$peopless = Mopcompetitor::where('cid', $id)->get();
		$grups = Mopclass::where('cid', $id)->get();
		$clubs = Moporganization::where('cid', $id)->get();
		$releys = DB::table('mopteam')->where('cid', $id)->get();
		foreach ($releys as $reley) {
			$reley;
		}


		return view('live.protocol.protocol_finish');
	}

	public function reley($id)
	{
		$grupa = $_GET['grup'];
		$event = Mopcompetition::where('cid', $id)->first();
		$online = Online::where('id', $id)->first();
		$eventseting = Event::where('id', $online->eventid)->first();
		$grups = Mopclass::where('cid', $id)->get();
		$cls = $grups->where('name', $grupa)->first();

		$grups = self::grup_list($grups, 'reley');



		$event = Mopcompetition::where('cid', $id)->first();
		$peoples = Mopcompetitor::where('cid', $id)->where('cls', $cls->id)->get();
		$clubs = Moporganization::where('cid', $id)->get();
		$teams = DB::table('mopteam')->where('cid', $id)->where('cls', $cls->id)->get();
		$teammembers = DB::table('mopteammember')->where('cid', $id)->get();
		// $peopless=$peoples;



		foreach ($peoples as $people) {
			$people->grup = $cls->name;
			$people->status = self::statussearh($people);
			$people->start = self::formatTime($people->st);
			$people->rezult = self::formatTime($people->rt);
			$people->rezultetap = self::formatTime($people->it);
			$people->leg = $teammembers->where('rid', $people->id)->first()->leg;
			$people->rid = $teammembers->where('rid', $people->id)->first()->rid;
			$people->comand = $teammembers->where('rid', $people->id)->first()->id;
			$people->team = $teams->where('id', $people->comand)->first();
			$people->rez_stat = self::rez_stat($people);
			$people->org = $clubs->where('id', $people->team->org)->first();

			// $people->mistse = self::mistse($people, $peopless);
		}
		foreach ($peoples as $people) {
			$people->etap = self::rezultetap($peoples, $people, $teams);
			$people->mistse = self::mistse($people, $peoples->where('leg', $people->leg));
			$people->plase = self::plases($people->stat, $people->mistse);
		}
		foreach ($teams as $team) {
			$team->peoples = $peoples->where('comand', $team->id);
			$team->count = $team->peoples->count();
			$team->mistse = self::mistse($team, $teams);
			$team->plases = self::plases($team->stat, $team->mistse);
			$team->rezult = self::formatTime($team->rt);
			$team->rez_stat = self::rez_stat($team);
		}
		$teams = $teams->sortBy('plases');
		$etap = $teams->where('mistse', 1)->first()->peoples;

		if (!$_GET['leg']) {
			return view('live.reley', compact('event', 'grups', 'grupa', 'teams', 'eventseting', 'online', 'etap'));
		}

		$leg = $_GET['leg'];
		$peoples = $peoples->where('leg', $leg);

		$peoples = $peoples->sortBy('plase');
		foreach ($peoples as $people) {
			if ($people->plase  == 1) $x = $people->rt;
			$vids = $people->rt - $x;
			$people->vids = self::formatVids($vids, $people->stat);
		}
		// dd($peoples);




		if ($_GET['leg']) {
			return view('live.reley', compact('event', 'grups', 'grupa', 'teams', 'eventseting', 'online', 'etap', 'peoples'));
		}
	}



	public function reley2($id)
	{

		$event = Mopcompetition::where('cid', $id)->first();
		$peoples = Mopcompetitor::where('cid', $id)->get();
		$grups = Mopclass::where('cid', $id)->get();
		$clubs = Moporganization::where('cid', $id)->get();
		$teams = DB::table('mopteam')->where('cid', $id)->get();
		$teammembers = DB::table('mopteammember')->where('cid', $id)->get();
		foreach ($peoples as $people) {
			$people->grup = self::grupsearh($grups, $people);
			$people->status = self::statussearh($people);
			$people->start = self::formatTime($people->st);
			$people->rezult = self::formatTime($people->rt);
			$people->rezultetap = self::formatTime($people->it);
			$people->leg = $teammembers->where('rid', $people->id)->first()->leg;
			$people->rid = $teammembers->where('rid', $people->id)->first()->rid;
			$people->comand = $teammembers->where('rid', $people->id)->first()->id;
			$people->rez_stat = self::rez_stat($people);
			// $people->etap=self::formatTime(self::rezultetap($peoples,$people));

		}


		foreach ($peoples as $people) {
			$people->etap = self::rezultetap($peoples, $people, $teams);
		}

		// dd($peoples);
		foreach ($teams as $team) {
			$team->peoples = $peoples->where('comand', $team->id);
			$team->count = $team->peoples->count();
			$team->mistse = self::mistse($team, $teams);
			$team->plases = self::plases($team->stat, $team->mistse);
			$team->rezult = self::formatTime($team->rt);
			$team->rez_stat = self::rez_stat($team);
		}
		$teams = $teams->sortBy('plases');
		foreach ($grups as $grup) {
			$grup->teams = $teams->where('cls', $grup->id);
		}




		// dd($grups);


		return view('live.reley', compact('grups'));
	}

	public function comand($id)
	{


		$event = Mopcompetition::where('cid', $id)->first();
		$online = Online::where('id', $id)->first();
		$eventseting = Event::where('id', $online->eventid)->first();
		if ($event == 0) {
			return view('live.erorrs.erorrs_rezult', compact('event', 'online', 'eventseting'));
		}
		$peopless = Mopcompetitor::where('cid', $id)->get();
		$grups = Mopclass::where('cid', $id)->get();
		$clubs = Moporganization::where('cid', $id)->get();
		$zalik = $online->cill;
		$formula = $online->rezult_formula_ball;
		foreach ($grups as $grup) {
			$grup->best = $peopless->where('cls', $grup->id)->where('cls', $grup->id)->where('stat', 1)->min('rt');
		}
		foreach ($peopless as $people) {
			if ($people->stat == 1) {
				$bestrt = $grups->where('id', $people->cls)->first->best;
				$people->mistse = self::mistse($people, $peopless);
				if ($formula == 'Б=100*(Чп/Чу)') {
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
				$people->cls_name = self::grupsearh($grups, $people);
				$people->rezult = self::formatTime($people->rt);
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
		}
		$clubs = $clubs->sortByDesc('sumball');
		$club_max_bal = $clubs->max('sumball');
		foreach ($clubs as $club) {

			$y = $y + 1;
			$club->mistse = $y;
			$club->count_fifnsh = $peopless->where('org', $club->id)->where('stat', 1)->count();
			$club->count_start = $peopless->where('org', $club->id)->count();
			$club->bal_vits = 75 / $club_max_bal * $club->sumball;
			$people = $peopless->where('org', $club->id)->where('stat', 1)->sortByDesc('bali');
			$text = "";
			foreach ($people as $p) {
				$sp = $p->mistse . "." . $p->name . "-" . round($p->bali, 2) . "         ";
				$text = $text . $sp;
			}


			$club->people = $text;
		}
		$peopless = $peopless->sortByDesc('bali');
		// print_r($clubs);



		return view('live.comand', compact('peopless', 'clubs', 'event', 'zalik', 'online', 'eventseting'));
	}

	public function rezult($id)
	{
		// $seting = SetingController::seting();
		$event = Mopcompetition::where('cid', $id)->first();
		$online = Online::where('id', $id)->first();
		$eventseting = Event::where('id', $online->eventid)->first();
		if ($event == 0) {
			return view('live.erorrs.erorrs_rezult', compact('event', 'online', 'eventseting'));
		}

		$peopless = Mopcompetitor::where('cid', $id)->get();
		$grups = Mopclass::where('cid', $id)->get();
		$grups = self::grup_list($grups, 'rezult');
		$clubs = Moporganization::where('cid', $id)->get();
		foreach ($peopless as $people) {
			$mistse = self::mistse($people, $peopless);
			$peoplesa[] = [
				'name' => $people->name,
				'cls' => self::grupsearh($grups, $people),
				'org' => self::clubsearh($clubs, $people),
				'club' => mb_substr(self::clubsearh($clubs, $people), 0, 10, 'UTF-8') . '...',
				'status' => self::statussearh($people),
				'stat' => $people->stat,
				'rt' => $people->rt,
				'st' => $people->st,
				'start' => self::formatTime($people->st),
				'rezult' => self::formatTime($people->rt),
				'rez_stat' => self::rez_stat($people),
				'mistse' => $mistse,
				'plases' => self::plases($people->stat, $mistse),


			];
		}
		// dd($peoplesa);

		// $cls = array_column($peoplesa, 'plases');
		// $st = array_column($peoplesa, 'st');
		// array_multisort($cls, SORT_ASC, $st, SORT_ASC, $peoplesa);
		$cls = array_column($peoplesa, 'cls');
		$st = array_column($peoplesa, 'plases');
		array_multisort($cls, SORT_ASC, $st, SORT_ASC, $peoplesa);

		$x = 0;
		$count_people = 0;
		foreach ($peoplesa as $people) {
			if ($people['plases'] == 1) {
				$x = $people['rt'];
			}
			$vids = $people['rt'] - $x;
			$people['vids'] = self::formatVids($vids, $people['stat']);
			// $people['vids'] = $x;
			$peoples[] = $people;
			$count_people = $count_people + 1;
		}
		// dd($peoplesa);
		$event->count_people = $count_people;
		$event->count_club = self::count_club($clubs);

		return view('live.rezult', compact('event', 'seting', 'peoples', 'grups', 'clubs', 'online', 'eventseting'));
	}

	public function start($id)
	{
		// $seting = SetingController::seting();
		$event = Mopcompetition::where('cid', $id)->first();
		$online = Online::where('id', $id)->first();
		$eventseting = Event::where('id', $online->eventid)->first();
		if ($event == 0) {
			return view('live.erorrs.erorrs_rezult', compact('event', 'online', 'eventseting'));
		}
		$peoples = Mopcompetitor::where('cid', $id)->get();
		$grups = Mopclass::where('cid', $id)->get();
		$grups = self::grup_list($grups, 'start');

		$clubs = Moporganization::where('cid', $id)->get();
		foreach ($peoples as $people) {
			// $people->mistse = self::mistse($people, $peoples);


			$people->cls = self::grupsearh($grups, $people);
			$people->orgid = $people->org;
			$people->org = self::clubsearh($clubs, $people);
			$people->club = mb_substr($people->org, 0, 10, 'UTF-8') . '...';
			$people->status = self::statussearh($people);
			$people->stat = $people->stat;
			$people->si = $people->si;
			// $people->rt = $people->rt;
			$people->start = self::formatTime($people->st);
			// $people->rezult = self::formatTime($people->rt);
			// $people->rez_stat = self::rez_stat($people);
			$people->plases = self::plases($people->stat, $people->mistse);
		}
		$peoples = $peoples->sortBy([
			['st', 'asc'],
			['cls', 'asc'],
		]);
		return view('live.start', compact('event', 'seting', 'peoples', 'grups', 'clubs', 'online', 'eventseting'));
	}


	public function start_cloks($id)
	{
		// $seting = SetingController::seting();
		$event = Mopcompetition::where('cid', $id)->first();
		$peoples = Mopcompetitor::where('cid', $id)->get();
		$grups = Mopclass::where('cid', $id)->get();
		$clubs = Moporganization::where('cid', $id)->get();
		foreach ($peoples as $people) {

			$people->mistse = self::mistse($people, $peoples);


			$people->grup = self::grupsearh($grups, $people);
			$people->club = self::clubsearh($clubs, $people);
			$people->start = self::formatTime($people->st);
		}

		$peoples = $peoples->sortBy([
			['st', 'asc'],
			['cls', 'asc'],
		]);
		$peopl = $peoples->toArray();
		// dd($peopl);
		return view('live.start_clock', compact('event', 'peopl'));
	}

	public function w_start_cloks($id)
	{
		// $seting = SetingController::seting();
		$event = Mopcompetition::where('cid', $id)->first();
		$peoples = Mopcompetitor::where('cid', $id)->get();
		$grups = Mopclass::where('cid', $id)->get();
		$clubs = Moporganization::where('cid', $id)->get();
		foreach ($peoples as $people) {

			$people->mistse = self::mistse($people, $peoples);


			$people->grup = self::grupsearh($grups, $people);
			$people->club = self::clubsearh($clubs, $people);
			$people->start = self::formatTime($people->st);
		}

		$peoples = $peoples->sortBy([
			['st', 'asc'],
			['cls', 'asc'],
		]);
		$peopl = $peoples->toArray();
		// dd($peopl);
		return $peopl;
	}

	public function split($id)
	{
		// $errors = session()->get('errors');
		//  if ($errors) {
		// 	redirect('5555');
		//  }

		$grup = $_GET['grup'];
		if (!$grup) {
			$grup = Mopclass::where('cid', $id)->first()->name;
		}
		$colors = ['#66ff33', '#3333ff', '#ffff00', '#ff5050', '#ff9900', '#9966ff', '#00ffcc', '#003399', '#009933', '#cc9900', '#66ff33', '#3333ff', '#ffff00', '#ff5050', '#ff9900', '#9966ff', '#00ffcc', '#003399', '#009933', '#cc9900'];
		// $seting = SetingController::seting();
		$grupss = Mopclass::where('cid', $id)->get();
		$event = Mopcompetition::where('cid', $id)->first();
		$online = Online::where('id', $id)->first();
		$eventseting = Event::where('id', $online->eventid)->first();
		if ($event == 0) {
			return view('live.erorrs.erorrs_rezult', compact('event', 'online', 'eventseting'));
		}
		$clubs = Moporganization::where('cid', $id)->get();
		$grups = Mopclass::where('cid', $id)->where('name', $grup)->first(); // виймаємо группу     
		$peopless = Mopcompetitor::where('cid', $id)->where('cls', $grups->id)->where('stat', '>', 0)->orderBy('stat', 'ASC')->orderBy('rt', 'ASC')->get(); // виймаємо учасників
		$mopkp = DB::table('mopclasscontrol')->where('cid', $id)->where('id', $grups->id)->orderBy('ord', 'ASC')->get(); // виймаєкомо КП для групи
		$mopradio = Mopradio::where('cid', $id)->get(); // виймаємо всі результати групи на кп

		if ($grups->count() < 1 or $peopless->count() < 1 or $mopradio->count() < 1) {
			if ($peopless->count() < 1) $errors = 2;
			elseif ($grups->count() < 1) $errors = 4;
			elseif ($mopradio->count() < 1) $errors = 3;
			return view('live.split', compact('event',  'errors', 'grup'));
		}

		foreach ($peopless as $p) {
			$split = $mopradio->where('id', $p->id);
			$popsplit = 0;
			foreach ($mopkp as $kp) {
				foreach ($split as $s) {
					if ($kp->ctrl == $s->ctrl) {
						$splitperegon2 = $s->rt - $popsplit;
						$allsplit[] = [
							'ctrl' => $s->ctrl, //записує в масив номер КП
							'rt' => $s->rt,
							'id' => $s->id,
							'ord' => $s->ord,
							'rt_peregon' => $splitperegon2
						];
						$popsplit = $s->rt;
					}
				}
			}
		}
		function min_rt($allsplit, $ctrl, $rt)
		{
			foreach ($allsplit as $sp) {
				if ($sp['ctrl'] == $ctrl and $sp['rt'] > 0) {
					$allctrl[] = [$sp['rt']];
				}
			}
			$min = min($allctrl);
			$vist = $rt - $min['0'];
			return $vist;
		}
		function min_rt_peregon($allsplit, $ctrl, $rt_peregon)
		{
			foreach ($allsplit as $sp) {
				if ($sp['ctrl'] == $ctrl and $sp['rt_peregon'] > 0) {
					$allctrl[] = [$sp['rt_peregon']];
				}
			}
			$min = min($allctrl);
			$vist = $rt_peregon - $min['0'];
			return $vist;
		}
		function min_rt_peregon2($allsplit, $ctrl, $rt_peregon)
		{
			foreach ($allsplit as $sp) {
				if ($sp['ctrl'] == $ctrl and $sp['rt_peregon'] > 0) {
					$allctrl[] = [$sp['rt_peregon']];
				}
			}
			$min = min($allctrl);
			$vist = $rt_peregon - $min['0'];
			return $vist;
		}
		function count_kp($allsplit, $mopsplit, $splitperegon)
		{
			$count = 1;
			foreach ($allsplit as $all) {
				if ($all['ctrl'] == $mopsplit->ctrl and $all['rt_peregon'] < $splitperegon) {
					$count = $count + 1;
				}
			}
			return $count;
		}
		function count_all($allsplit, $mopsplit)
		{
			$count = 1;
			foreach ($allsplit as $all) {
				if ($all['ctrl'] == $mopsplit->ctrl and $all['rt'] < $mopsplit->rt) {
					$count = $count + 1;
				}
			}
			return $count;
		}
		$color = 0;
		$mistse = 0;
		$poprt = 0;
		foreach ($peopless as $people) { //цей фурич робить масив з даних всіх сплітів групи;
			$splitpeople = array();   // очищає спліти попереднього учасниак
			$splitradio = $mopradio->where('id', $people->id); //вибирає всі спліти учасника
			$popsplit = 0;
			$x = 0;
			$z = 0;
			$rttt = 0;
			$ctrl = 0;

			foreach ($mopkp as $kp) {
				$kkk = 0;

				foreach ($splitradio as $mopsplit) { //форичитьть всі спліти УЧАСНИКА	
					if ($kp->ctrl == $mopsplit->ctrl) {
						$splitperegon = $mopsplit->rt - $popsplit;
						$z = min_rt_peregon($allsplit, $mopsplit->ctrl, $splitperegon) + $z;
						$rttt = $rttt + $z;
						$splitpeople[] = [
							'ord' => $kp->ord,
							'ctrl' => $mopsplit->ctrl, //записує в масив номер КП
							'rt' => $mopsplit->rt,
							'rttt' => $rttt / 10,
							'id' => $mopsplit->id,
							'count_all' => count_all($allsplit, $mopsplit),
							'rt_peregon' => $splitperegon,
							'count_cp' => count_kp($allsplit, $mopsplit, $splitperegon),
							'time' => self::formatTime($mopsplit->rt),
							'time_peregon' => self::formatTime($splitperegon),
							'vidst_rt' => min_rt($allsplit, $mopsplit->ctrl, $mopsplit->rt),
							'vidst_rt_peregon' => min_rt_peregon($allsplit, $mopsplit->ctrl, $splitperegon),
							'time_vidst_rt_peregon' => self::formatVids(min_rt_peregon($allsplit, $mopsplit->ctrl, $splitperegon), 1),
							'time_vidst_rt' => self::formatVids(min_rt($allsplit, $mopsplit->ctrl, $mopsplit->rt), 1)
						]; //записує в масив результат на КП
						$popsplit = $mopsplit->rt;
						$z = min_rt_peregon($allsplit, $mopsplit->ctrl, $splitperegon);
						$x = $x + 1;
						$kkk = 1;
					}
				}
				if ($kkk == 0) {

					$splitpeople[] = [
						'ctrl' => "0", //записує в масив номер КП
						'rt' =>  "0",
						'rttt' =>  "0",
						'id' =>  "0",
						'count_all' =>  "0",
						'rt_peregon' =>  "0",
						'count_cp' =>  "0",
						'time' =>  "0",
						'time_peregon' =>  "0",
						'vidst_rt' =>  "0",
						'vidst_rt_peregon' =>  "0",
						'time_vidst_rt_peregon' =>  "0",
						'time_vidst_rt' =>  "0",
					]; //записує в масив результат на КП


				}
			}
			if ($people->stat == 1) {
				$mistse = $mistse + 1;
			} elseif ($people->stat != 1) {
				$mistse = self::statussearh($people);
			}
			define("LIDERRT", $people->rt);
			$vidst = $people->rt - LIDERRT;
			$people_rezult[] = [
				'name' => $people->name,
				'stat' => $people->stat,
				'id' => $people->id,
				'split' => $splitpeople,
				'rt' => $people->rt,
				'result' => self::rez_stat($people),
				'vidst' => self::formatVids($vidst, $people->stat),
				'color' =>	$colors[$color],
				'mistse' => $mistse,
				'club' => self::clubsearh($clubs, $people),
				'rt_peregon' => self::formatTime($people->rt - $mopsplit->rt),
				'finish' => self::formatTime($people->rt),
			];
			$color = $color + 1;
		}
		return view('live.split', compact('event', 'seting', 'people_rezult', 'mopkp', 'grupss', 'id', 'grup', 'online', 'eventseting'));
	}

	public function atlet($name)
	{

		$name = str_replace([',', '.'], '', $name);
		$n = explode(' ', $name, 2);
		mb_internal_encoding("UTF-8");
		$c1 = mb_strlen($n[0]);
		$c2 = mb_strlen($n[1]);
		if ($c1 < 5)	$n1 = $n[0];
		elseif (($c1 < 6)) $n1 = mb_substr($n[0], 0, -1);
		else $n1 = mb_substr($n[0], 0, -2);
		if ($c2 < 5)	$n2 = $n[1];
		elseif (($c2 < 6)) $n2 = mb_substr($n[1], 0, -1);
		else $n2 = mb_substr($n[1], 0, -2); //обробка імені

		$peoples = Mopcompetitor::where('name', 'LIKE', "$n1% $n2%")->orwhere('name', 'LIKE', "$n2% $n1%")->get();

		$dani = DB::table('people')->where('name', 'LIKE', "$n1% $n2%")->orwhere('name', 'LIKE', "$n2% $n1%")->first();
		if ($dani->name) {
			$dani->club = DB::table('club')->where('id', $dani->clubid)->first();
			$dani->clu = $dani->club->title;
			$dani->obl = DB::table('obl')->where('id', $dani->oblid)->first();
		} elseif ($dani->name == 0) {
			$grups = Mopclass::where('cid', $dani->cid)->get();
			$clubs = Moporganization::where('cid', $dani->cid)->get();
			$dani = Mopcompetitor::where('name', 'LIKE', "$n1% $n2%")->orwhere('name', 'LIKE', "$n2% $n1%")->first();
			$dani->clu = self::clubsearh($clubs, $dani);


			$dani->grup = self::grupsearh($grups, $dani);
		}
		// dd($dani);


		foreach ($peoples as $people) {
			$event = Mopcompetition::where('cid', $people->cid)->first();
			$peopless = Mopcompetitor::where('cid', $people->cid)->get();
			$grups = Mopclass::where('cid', $people->cid)->get();
			$clubs = Moporganization::where('cid', $people->cid)->get();
			$people->event = $event;
			$people->mistse = self::mistse($people, $peopless);
			$people->club = self::clubsearh($clubs, $people);
			$people->grup = self::grupsearh($grups, $people);
			$people->rez = self::rez_stat($people);
			$people->vid = self::vidst($peopless, $people);
		}

		$peoples = $peoples->sortBy([
			['event_date', 'desk'],

		]);
		// dd($peoples);
		return view('live.atlet', compact('peoples', 'dani'));
	}

	public function search_atlet(Request $request)
	{

		$query = $request->input('query');
		if ($query) {
			$athletes = Peoples::where('name', 'like', "%$query%")->get();
		} elseif (!$query) {
			$athletes = Peoples::where('name', 'like', "%548445451213545435454%")->get();
		}


		return view('live.page.search_atlet', compact('athletes'));
	}

	// public function protocol_summa($id)
	// {
	// $event = Mopcompetition::where('cid', $id)->first();
	// $peopless1 = Mopcompetitor::where('cid', 42)->get();
	// $peopless2 = Mopcompetitor::where('cid', 44)->get();
	// $peopless=$peopless1->merge($peopless2);
	// $grups = Mopclass::where('cid', $id)->get();
	// $clubs = Moporganization::where('cid', $id)->get();
	// $peopless=collect();
	// $grupss=collect();

	// $etaps=explode(' ', "42 44 45");

	// foreach ($etaps as $etap) {
	// 	$peoples = self::rezultat($etap);
	// 	$peopless=$peopless->merge($peoples);
	// }

	// foreach ($etaps as $etap) {
	// 	$peoples = Mopcompetitor::where('cid', $etap)->get();
	// 	$peopless=$peopless->merge($peoples);


	// 	$grups = Mopclass::where('cid', $etap)->get();
	// 	$grupss=$grupss->merge($grups);
	// }
	// foreach ($peopless as $people) {
	// 	$people->grup=grupsearh($grupss, $people)
	// }

	// $peopless = $peopless->groupBy('name');

	// foreach ($peopless as $name => $danis) {
	// 	$mistse=0;
	// 	foreach ($danis as $dani) {
	// 		$mistse=$dani->mistse;
	// 		$dani->sum=
	// 	}
	// }

	// dd($peopless);

	// $seting = Online::where('id', $id)->first();
	// foreach ($etaps as $etap) {
	//     $seting = Online::where('id', $etap)->get()->id;
	// }


	//     return view('live.protocol.protocol_summa',compact('etaps','peopless'));

	// }








	//Функції
	static function rezultat($id)
	{
		// $seting = SetingController::seting();
		// $event = Mopcompetition::where('cid', $id)->first();
		$peopless = Mopcompetitor::where('cid', $id)->get();
		$grups = Mopclass::where('cid', $id)->get();
		$clubs = Moporganization::where('cid', $id)->get();
		foreach ($peopless as $people) {
			$people->mistse = self::mistse($people, $peopless);


			$people->cls = self::grupsearh($grups, $people);
			$people->org = self::clubsearh($clubs, $people);
			$people->status = self::statussearh($people);
			$people->stat = $people->stat;
			$people->rt = $people->rt;
			$people->start = self::formatTime($people->st);
			$people->rezult = self::formatTime($people->rt);
			$people->rez_stat = self::rez_stat($people);
			$people->plases = self::plases($people->stat, $mistse);
		}
		$peopless = $peopless->sortBy([
			['cls', 'asc'],
			['plases', 'asc'],
		]);
		// $cls = sortByDesc($peoplesa, 'cls');
		// $st = array_column($peoplesa, 'plases');
		// array_multisort($cls, SORT_ASC, $st, SORT_ASC, $peoplesa);
		$x = 0;
		foreach ($peopless as $people) {
			if ($people->plases == 1) $x = $people->rt;
			$vids = $people->rt - $x;
			$people->vids = self::formatVids($vids, $people['stat']);
			// $peoples[] = $people;
			$count_people = $count_people + 1;
		}
		// $event->count_people = $count_people;
		// $event->count_club = self::count_club($clubs);
		return $peopless;
	}

	// static function grups($grups, $people)
	// { //Шукає рупу в базі даних з групами
	// 	foreach ($grups as $grup) {
	// 		$count=$people->where('cls')
	// 		$grups->start=*
	// 	}
	// 	return $grup;
	// }


	static function rezultetap($peoples, $people, $teams)
	{
		$leg = $people->leg + 1;

		$rez = $peoples->where('comand', $people->comand)->where('leg', $leg)->first()->rezultetap;
		if ($rez == 0 and $people->stat == 1) {
			$team = $teams->where('id', $people->comand)->first();
			$rez = self::rez_stat($team);
		}
		return $rez;
	}

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


	static function vidst($peoples, $people)
	{ // місце для правильного сортувння
		$min = $peoples->where('cls', $people->cls)->where('stat', 1)->min('rt');
		// dd($min);
		$vist = $people->rt - $min;
		$vidst = self::formatVids($vist, $people->stat);
		return $vidst;
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


	static function rez_stat($people){
	$controller = new SiteOnlineController();
    
	 //зєднрує статус та результат
		if ($people->stat != 1)
			return $controller->statussearh($people);
		else
			return $controller->formatTime($people->rt);
	}

	static function tip_event($grups)
	{ //Додає дл групи тип змагань 
		$cid = $grups->first()->cid;
		$team = DB::table('mopteam')->where('cid', $cid)->get();
		foreach ($grups as $grup) {
			$grup->reley = $team->where('cls', $grup->id)->first()->id;
		}
		return $grups;
	}

	static function grup_list($grups, $start)
	{ //Додає дл групи тип змагань 
		$cid = $grups->first()->cid;
		$team = DB::table('mopteam')->where('cid', $cid)->get();
		if ($start == 'start') {
			foreach ($grups as $grup) {
				$grup->reley = $team->where('cls', $grup->id)->first()->id;
				$grup->rezult = '<a
					href="/livess/start/' . $cid . '#' . $grup->name . '">' . $grup->name . '</a>';
			}
		} else {
			foreach ($grups as $grup) {
				$grup->reley = $team->where('cls', $grup->id)->first()->id;
				if ($grup->reley > 0) {
					$grup->rezult = '<a
				href="/livess/reley/' . $cid . '?grup=' . $grup->name . '">' . $grup->name . '</a>';
				} else {
					$grup->rezult = '<a
				href="/livess/rezult/' . $cid . '#' . $grup->name . '">' . $grup->name . '</a>';
				}
			}
		}

		return $grups;
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

	static function bali($vids, $bestrt, $people, $formula) // Функція вибирає формулу за якею нараховувати бали
	{
		if ($formula == 'Б=100*(Чп/Чу)') {
			$bali = $vids * ($bestrt / $people);
			return $bali;
		}
	}
}
