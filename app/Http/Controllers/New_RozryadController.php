<?php

namespace App\Http\Controllers;

// use FontLib\TrueType\Collection;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class New_RozryadController extends Controller
{
    static function rozryad($peoples,$protocol)
    {
        $peoples=New_FunctionController::bali($peoples,$protocol->formula);
        foreach ($peoples as $people) {
           

            if ($people->sort_plases >= 1 and $people->sort_plases <= 12) {
                $people->rang = self::rang_people($people->roz, $people->class_name);
                
            }
        }
        $class_peoples_rang = self::rang_class($peoples,$protocol);
        // $class_peoples_rang=self::rang_class($peoples);
        return $class_peoples_rang;
    }

    static function rang_people($i, $grup)
    {
        $i = str_replace("I", "І", $i);
        $i = strtolower($i);
        if (stripos($i, '3') !== false and stripos($i, 'ю') !== false) {
            $rang = 0.3;
        } elseif (
            stripos($i, '2') !== false and stripos($i, 'ю') !== false
            || stripos($i, 'ііі') !== false
            || stripos($i, 'iii') !== false
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


    static function rang_class($peoples,$protocol)
    {
        $class_peoples = New_FunctionController::class_peoples($peoples);
        foreach ($class_peoples as $clas) {
            $clas->rang = $peoples->where('class_name', $clas->class_name)->sum('rang');
            $clas->best_time = $peoples->where('class_name', $clas->class_name)->where('sort_plases', '>=', 1)->where('sort_plases', '<=', 12)->min('rt');
            $rozriad = self::klasifik($clas);
            $clas->rozryad = $rozriad;
            $clas->klas_dist=self::klas_dist($clas->class_name);
           
            foreach ($clas->peoples as $people) {
                
                foreach ($rozriad as $roz) {
                    if ($roz['time_vikon'] >= $people->rt and $people->stat==1) {
                        $clas->leng=$people->legts;
                        $people->vik_roz = self::max_roz($roz['nazva'],$protocol->max);
                        break;
                    }
                }
            }
        }
        // dd($class_peoples);
        return $class_peoples;
    }



    static function klasifik($clas)
    {
        $rozz = collect([
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
        ]);

        foreach ($rozz as $roz) {
            if ($clas->rang > $roz['rang']) {
                break;
            }
        }
        
        unset($roz['rang']);
        
        foreach ($roz as $key => $value) {
            $value= self::rahroz($clas->class_name, $value);
            if ($value!=0) {
                $key=self::undor($clas->class_name, $key);
            $timevik = $clas->best_time / 100 * $value;
            $time = New_FunctionController::formatTime($timevik);
            $rozryads[] = ['vidsotki' => $value, 'nazva' => $key, 'time_vikon' => $timevik, 'time' => $time];
            }
         
        }
        $rozryads = collect($rozryads);
        return $rozryads;
    }


    static function undor($grup, $vr)
    {
        if (preg_replace("/[^0-9]/", "", $grup) >= 10 and preg_replace("/[^0-9]/", "", $grup) < 16) {
            if ($vr == 'III') {
                return '2-ю';
            }
            if ($vr == 'II') {
                return '1-ю';
            }

            if ($vr == 'I') {
                return '1-ю';
            }
            if ($vr == 'КМСУ') {
                return '1-ю';
            }
            if ($vr == 'МСУ') {
                return '1-ю';
            } else return $vr;
        }
        if (preg_replace("/[^0-9]/", "", $grup) >= 16 and preg_replace("/[^0-9]/", "", $grup) <= 21 or preg_replace("/[^0-9]/", "", $grup) <= 1) {
            if ($vr != '3-ю') {
                return $vr;
            } else return '';
        } else return '';
    }

    static function rahroz($grup, $vr)
    { 
        if (preg_replace("/[^0-9]/", "", $grup) < 10 and preg_replace("/[^0-9]/", "", $grup) != 0) {
            $vr=0;
        }
        if (preg_replace("/[^0-9]/", "", $grup) > 21) {
            $vr=0;
        }
     return $vr;
    }
    
    static function klas_dist($grup){
        if (preg_replace("/[^0-9]/", "", $grup) >= 10 and preg_replace("/[^0-9]/", "", $grup) < 16) {
            $vr="dt";
        }
        if (preg_replace("/[^0-9]/", "", $grup) >= 16 and preg_replace("/[^0-9]/", "", $grup) <= 21 or preg_replace("/[^0-9]/", "", $grup) <= 1) {
            $vr="dor";
        }
     return $vr;

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

    
}
