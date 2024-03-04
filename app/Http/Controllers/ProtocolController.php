<?php

namespace App\Http\Controllers;

use App\Models\Protocol;
use App\Models\Register;
use Illuminate\Http\Request;

/**
 * Class ProtocolController
 * @package App\Http\Controllers
 */
class ProtocolController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $protocols = Protocol::paginate();

        return view('protocol.index', compact('protocols'))
            ->with('i', (request()->input('page', 1) - 1) * $protocols->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $protocol = new Protocol();
        return view('protocol.create', compact('protocol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Protocol::$rules);

        $protocol = Protocol::create($request->all());

        return redirect()->route('protocols.index')
            ->with('success', 'Protocol created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    ///////////////
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

    function second($time)
    {                                         //Робить з ГГ:хв:сек просто секунди
        return $time = strtotime($time);
    }


    function status($status, $rezult)
    {
        if (substr_count($status, 'Кон') > 0) {
            return  'КЧ ' . date('H:i:s', intval($rezult));
        }
        switch ($status) {
            case 'DNS':
                return $status;
                break;
            case 'DSQ':
                return $status;
                break;
            case 'DNF':
                return $status;
                break;
            case 'пп.2.6.10':
                return 'DSQ';
                break;
            default:
                return date('H:i:s', intval($rezult));
        }
    }


    function rang_people($i, $grup)
    {

        $i = str_replace("I", "І", $i);
        $i = strtolower($i);



        if (stripos($i, '3') !== false and stripos($i, 'ю') !== false) {
            $rang = 0.3;
        } elseif (
            stripos($i, '2') !== false and stripos($i, 'ю') !== false
            || stripos($i, 'iii') !== false
            || stripos($i, 'ііі') !== false
        ) {
            $rang = 1;
        } elseif (
            stripos($i, '1') !== false and stripos($i, 'ю') !== false
            || stripos($i, 'ii') !== false
            || stripos($i, 'іі') !== false
        ) {
            $rang = 3;
        } elseif (
            stripos($i, '1') !== false
            || stripos($i, 'i') !== false
            || stripos($i, 'і') !== false
        ) {
            $rang = 10;
        } elseif (
            stripos($i, 'к') !== false
            || stripos($i, 'k') !== false
        ) {
            $rang = 30;
        } elseif (stripos($i, 'мс') !== false) {
            $rang = 100;
        } elseif (
            stripos($i, 'б') !== false
            || stripos($i, ' ') !== false
            || stripos($i, 'р') !== false
        ) {
            $rang = 0.1;
            if (preg_replace("/[^0-9]/", "", $grup) >= 16) {
                $rang = 0.3;
            }
        }
        return $rang;
    }



    function undor($grup, $vr)
    {
        if (preg_replace("/[^0-9]/", "", $grup) < 16) {
            if ($vr == 'III') {
                return '2-ю';
            }
            if ($vr == 'II') {
                return '1-ю';
            }

            if ($vr == 'I') {
                return '1-ю';
            }
            if ($vr == 'KMS') {
                return '1-ю';
            }
            if ($vr == 'MS') {
                return '1-ю';
            } else return $vr;
        }
        if (preg_replace("/[^0-9]/", "", $grup) >= 16 and preg_replace("/[^0-9]/", "", $grup) <= 21) {
            if ($vr != '3-ю') {
                return $vr;
            } else return '';
        } else return '';
    }

    function ball_formul($twin, $tpip, $coef,$formula,$mistse)
    {
        if ($formula=='Б=100*(Чп/Чу)'){
            $bal = round($coef * ($twin / $tpip), 2);
        }
        if ($formula == 'Пліч о пліч') {
            if ($mistse==1) $bal= 100;
            if ($mistse==2) $bal = 95;
            if ($mistse==3) $bal = 90;
            if ($mistse==4) $bal = 85;
            if ($mistse>=5 and $mistse<=88) $bal = 89-$mistse;			
        }
        
        return $bal;
    }



    function rozryad($rang, $time_best, $grup)
    {
        $rozz = [
            ['rang' => 1200, 'МСУ' => 0, 'КМСУ' => 131, 'I' => 147, 'II' => 174, 'III' => 209, '3-ю' => 0],
            ['rang' => 1100, 'МСУ' => 0, 'КМСУ' => 129, 'I' => 144, 'II' => 170, 'III' => 204, '3-ю' => 0],
            ['rang' => 1000, 'МСУ' => 0, 'КМСУ' => 126, 'I' => 141, 'II' => 166, 'III' => 199, '3-ю' => 0],
            ['rang' => 800, 'МСУ' => 0, 'КМСУ' => 123, 'I' => 138, 'II' => 162, 'III' => 194, '3-ю' => 0],
            ['rang' => 630, 'МСУ' => 0, 'КМСУ' => 120, 'I' => 135, 'II' => 158, 'III' => 189, '3-ю' => 0],
            ['rang' => 500, 'МСУ' => 0, 'КМСУ' => 117, 'I' => 132, 'II' => 154, 'III' => 184, '3-ю' => 224],
            ['rang' => 400, 'МСУ' => 0, 'КМСУ' => 114, 'I' => 129, 'II' => 150, 'III' => 179, '3-ю' => 219],
            ['rang' => 320, 'МСУ' => 0, 'КМСУ' => 111, 'I' => 126, 'II' => 146, 'III' => 174, '3-ю' => 214],
            ['rang' => 250, 'МСУ' => 0, 'КМСУ' => 108, 'I' => 123, 'II' => 142, 'III' => 170, '3-ю' => 209],
            ['rang' => 200, 'МСУ' => 0, 'КМСУ' => 105, 'I' => 120, 'II' => 138, 'III' => 166, '3-ю' => 204],
            ['rang' => 160, 'МСУ' => 0, 'КМСУ' => 102, 'I' => 117, 'II' => 135, 'III' => 162, '3-ю' => 199],
            ['rang' => 120, 'МСУ' => 0, 'КМСУ' => 100, 'I' => 114, 'II' => 132, 'III' => 158, '3-ю' => 194],
            ['rang' => 100, 'MS' => 0, 'KMS' => 0, 'I' => 111, 'II' => 129, 'III' => 154, '3-ю' => 189],
            ['rang' => 80, 'MS' => 0, 'KMS' => 0, 'I' => 108, 'II' => 126, 'III' => 150, '3-ю' => 184],
            ['rang' => 63, 'MS' => 0, 'KMS' => 0, 'I' => 105, 'II' => 123, 'III' => 146, '3-ю' => 179],
            ['rang' => 50, 'MS' => 0, 'KMS' => 0, 'I' => 102, 'II' => 120, 'III' => 142, '3-ю' => 174],
            ['rang' => 36, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 117, 'III' => 138, '3-ю' => 170],
            ['rang' => 32, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 114, 'III' => 135, '3-ю' => 166],
            ['rang' => 25, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 111, 'III' => 132, '3-ю' => 162],
            ['rang' => 20, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 108, 'III' => 129, '3-ю' => 158],
            ['rang' => 16, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 105, 'III' => 126, '3-ю' => 154],
            ['rang' => 13, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 102, 'III' => 123, '3-ю' => 150],
            ['rang' => 10, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 100, 'III' => 120, '3-ю' => 146],
            ['rang' => 8, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 0, 'III' => 117, '3-ю' => 142],
            ['rang' => 6, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 0, 'III' => 114, '3-ю' => 138],
            ['rang' => 5, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 0, 'III' => 111, '3-ю' => 135],
            ['rang' => 4, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 0, 'III' => 108, '3-ю' => 132],
            ['rang' => 3, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 0, 'III' => 105, '3-ю' => 129],
            ['rang' => 2, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 0, 'III' => 0, '3-ю' => 123],
            ['rang' => 0.9, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 0, 'III' => 0, '3-ю' => 114],
            ['rang' => 0, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 0, 'III' => 0, '3-ю' => 0]
        ];

        foreach ($rozz as $roz) {
            if ($rang >= $roz['rang']) {
                break;
            }
        }
        // dd($roz);
        $ekran[] = ['roz_name' => " ", 'roz_proz' => " ", 'timeo' => " "];

        if (preg_replace("/[^0-9]/", "", $grup) >= 16) unset($roz['3-ю']);
        foreach ($roz as $ii) {
            if ($ii != 0 and array_search($ii, $roz) != 'rang') {
                if (preg_replace("/[^0-9]/", "", $grup) >= 10 and preg_replace("/[^0-9]/", "", $grup) <= 21) {
                    $z = array_search($ii, $roz);
                    if (self::undor($grup, $z) != '') {
                        $u = self::undor($grup, $z);
                        $timevik = $time_best / 100 * $ii;

                        $ekran[] = ['roz_name' => $u, 'roz_proz' => $ii . "%", 'timeo' => date('H:i:s', intval($timevik)) . ";"];
                    }
                }
            }
        }

        return $ekran;
    }

    public function max_roz($roz, $max)
    {
        if ($max == 0) {
            return $roz;
        } elseif ($max == 1 and $roz == 'МСУ') {
            return 'КМСУ';
        } elseif ($max == 2 and $roz == 'МСУ' || $roz == 'КМСУ') {
            return 'I';
        } elseif ($max == 3 and $roz == 'МСУ' || $roz == 'КМСУ' || $roz == 'I') {
            return 'II';
        } elseif ($max == 4 and $roz == 'МСУ' || $roz == 'КМСУ' || $roz == 'I' || $roz == 'II') {
            return 'III';
        } elseif ($max == 5 and $roz == 'МСУ' || $roz == 'КМСУ' || $roz == 'I' || $roz == 'II' || $roz == 'III') {
            return ' ';
        }
        return $roz;
    }

    function klasifik($rang, $time_best, $time, $grup, $status, $max)
    {


        $rozz = [
            ['rang' => 1200, 'МСУ' => 0, 'КМСУ' => 131, 'I' => 147, 'II' => 174, 'III' => 209, '3-ю' => 0],
            ['rang' => 1100, 'МСУ' => 0, 'КМСУ' => 129, 'I' => 144, 'II' => 170, 'III' => 204, '3-ю' => 0],
            ['rang' => 1000, 'МСУ' => 0, 'КМСУ' => 126, 'I' => 141, 'II' => 166, 'III' => 199, '3-ю' => 0],
            ['rang' => 800, 'МСУ' => 0, 'КМСУ' => 123, 'I' => 138, 'II' => 162, 'III' => 194, '3-ю' => 0],
            ['rang' => 630, 'МСУ' => 0, 'КМСУ' => 120, 'I' => 135, 'II' => 158, 'III' => 189, '3-ю' => 0],
            ['rang' => 500, 'МСУ' => 0, 'КМСУ' => 117, 'I' => 132, 'II' => 154, 'III' => 184, '3-ю' => 224],
            ['rang' => 400, 'МСУ' => 0, 'КМСУ' => 114, 'I' => 129, 'II' => 150, 'III' => 179, '3-ю' => 219],
            ['rang' => 320, 'МСУ' => 0, 'КМСУ' => 111, 'I' => 126, 'II' => 146, 'III' => 174, '3-ю' => 214],
            ['rang' => 250, 'МСУ' => 0, 'КМСУ' => 108, 'I' => 123, 'II' => 142, 'III' => 170, '3-ю' => 209],
            ['rang' => 200, 'МСУ' => 0, 'КМСУ' => 105, 'I' => 120, 'II' => 138, 'III' => 166, '3-ю' => 204],
            ['rang' => 160, 'МСУ' => 0, 'КМСУ' => 102, 'I' => 117, 'II' => 135, 'III' => 162, '3-ю' => 199],
            ['rang' => 120, 'МСУ' => 0, 'КМСУ' => 100, 'I' => 114, 'II' => 132, 'III' => 158, '3-ю' => 194],
            ['rang' => 100, 'MS' => 0, 'KMS' => 0, 'I' => 111, 'II' => 129, 'III' => 154, '3-ю' => 189],
            ['rang' => 80, 'MS' => 0, 'KMS' => 0, 'I' => 108, 'II' => 126, 'III' => 150, '3-ю' => 184],
            ['rang' => 63, 'MS' => 0, 'KMS' => 0, 'I' => 105, 'II' => 123, 'III' => 146, '3-ю' => 179],
            ['rang' => 50, 'MS' => 0, 'KMS' => 0, 'I' => 102, 'II' => 120, 'III' => 142, '3-ю' => 174],
            ['rang' => 36, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 117, 'III' => 138, '3-ю' => 170],
            ['rang' => 32, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 114, 'III' => 135, '3-ю' => 166],
            ['rang' => 25, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 111, 'III' => 132, '3-ю' => 162],
            ['rang' => 20, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 108, 'III' => 129, '3-ю' => 158],
            ['rang' => 16, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 105, 'III' => 126, '3-ю' => 154],
            ['rang' => 13, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 102, 'III' => 123, '3-ю' => 150],
            ['rang' => 10, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 100, 'III' => 120, '3-ю' => 146],
            ['rang' => 8, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 0, 'III' => 117, '3-ю' => 142],
            ['rang' => 6, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 0, 'III' => 114, '3-ю' => 138],
            ['rang' => 5, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 0, 'III' => 111, '3-ю' => 135],
            ['rang' => 4, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 0, 'III' => 108, '3-ю' => 132],
            ['rang' => 3, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 0, 'III' => 105, '3-ю' => 129],
            ['rang' => 2, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 0, 'III' => 0, '3-ю' => 123],
            ['rang' => 0.9, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 0, 'III' => 0, '3-ю' => 114],
            ['rang' => 0, 'MS' => 0, 'KMS' => 0, 'I' => 0, 'II' => 0, 'III' => 0, '3-ю' => 0]
        ];
        if ($status == 1) {





            foreach ($rozz as $roz) {
                if ($rang >= $roz['rang']) {
                    break;
                }
            }

            unset($roz['rang']);
            foreach ($roz as $ta) {
                $timevik = $time_best / 100 * $ta;
                if ($time <= $timevik) {
                    $u = array_search($ta, $roz);
                    if (preg_replace("/[^0-9]/", "", $grup) >= 10 and preg_replace("/[^0-9]/", "", $grup) <= 21) {
                        $roz = self::undor($grup, $u);
                        return self::max_roz($roz, $max);
                    }
                }
            }
        }
    }






    public function show($id)
    {
        $protocol = Protocol::find($id);


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

            if (!$people_rezult->roz) {
                $people_rezult->roz = 'б/р'; //присвоює бр в кого нема розряду 
            }

            $rezult = self::second($people_rezult->finish) - self::second($people_rezult->start);    // Прораховує результат в сикундах
            if ($people_rezult->mistse > 0) {
                $people_rezult->statuss = 1; // ставить статус 1 
                $people_rezult->rez = $rezult; //результат в секундах
                $people_rezult->timerez = self::status($people_rezult->status, $rezult); //
                $people_rezult->mistse = preg_replace('/[^0-9]/', '', $people_rezult->mistse);
                $people_rezult->rang = self::rang_people($people_rezult->roz, $people_rezult->grup); // присвоює ранг учасника				
            } else {
                $people_rezult->statuss = 5;
                $people_rezult->mistse = 9999999;
                $people_rezult->timerez = self::status($people_rezult->status, $rezult);
                $people_rezult->rez = $rezult;
            }
        }

        $all_rezult2 = $all_rezult->where('statuss', '1')->values()->sortBy('rez');
        $all_rezult3 = $all_rezult->where('statuss', '5')->values()->sortBy('rez');
        $all_rezult4 = $all_rezult2->merge($all_rezult3); // Список цчасників відсортований



        $all_rezult5 = $all_rezult2->where('mistse', '1');
        // dd($all_rezult5);


        $grups = $all_rezult5->forget('grup')->unique('grup'); // Групи переможці і найкращі результтаи
        // dd($grups);
        foreach ($grups as $grup) {

            $grup->sumrang = $all_rezult2->where('grup', $grup->grup)->take(12)->sum('rang');
            // $grup->leng = $all_rezult2->where('grup', $grup->grup and $all_rezult2->legts);
            $grup->bestrez = $grup->rez;
            if (preg_replace("/[^0-9]/", "", $grup->grup) >= 10 and preg_replace("/[^0-9]/", "", $grup->grup) < 16) {
                $grup->cld = $protocol->cld;
            } else {

                $grup->cld = $protocol->cldr;
            }
            $grup->rozryad = self::rozryad($grup->sumrang, $grup->bestrez, $grup->grup); // виводить розряди під групою

        }

        // $grups

        $grups2 = $grups->sortBy('grup');;
        foreach ($grups2 as $grup) {
            $x = 1;
            $y = 1;
            $max = 1;
            foreach ($all_rezult4 as $rez) {
                if ($rez->mistse == 9999999) {
                    // $rez->mistse == $rez->status;
                    $rez->mistse = $x;
                    $x = $x + 1;
                }
                if ($grup->grup == $rez->grup and $rez->rez) {
                    $rez->mistse = $x;
                    $x = $x + 1;
                    $rez->mistse2 = " ";
                    $rez->vikroz = self::klasifik($grup->sumrang, $grup->bestrez, $rez->rez, $grup->grup, $rez->statuss, $protocol->max);
                    // $rez->vikroz = self::max_roz($vikroz,$max);
                    if ($protocol->formula) {
                        if ($rez->statuss == 1) {
                            $rez->ball = self::ball_formul($grup->bestrez, $rez->rez, 100,$protocol->formula,$rez->mistse);
                        } else $rez->ball = " ";
                    }

                    if ($grup->grup == $rez->grup and $rez->statuss == 1) {
                        $rez->mistse2 = $y . ".";
                        $y = $y + 1;
                    } else $rez->mistse2 = " ";
                } elseif ($grup->grup == $rez->grup and $rez->statuss == 5) {
                    // $y = $y + 1;

                    $rez->mistse2 = " ";
                    $rez->vikroz = " ";
                }
            }
        }
        // print_r($grups2);
        // echo "</br>////////////////////////////////////////////////";
        // print_r($all_rezult4);

        // $grups2->values()->sortBy('grup');
        // dd($grups2);
        return view('protocol.protokol', compact('all_rezult4', 'grups2', 'protocol'));




        // return view('protocol.show', compact('protocol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $protocol = Protocol::find($id);

        return view('protocol.edit', compact('protocol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Protocol $protocol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Protocol $protocol)
    {
        request()->validate(Protocol::$rules);

        $protocol->update($request->all());

        return redirect()->route('protocols.index')
            ->with('success', 'Protocol updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $protocol = Protocol::find($id)->delete();

        return redirect()->route('protocols.index')
            ->with('success', 'Protocol deleted successfully');
    }


    public function export()
    {

        // return view('protocol.export');
        return response()->view('protocol.export')->header('Content-Type', 'text/xml');
    }
    ////////////////////////

}
