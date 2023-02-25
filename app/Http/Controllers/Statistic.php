<?php

namespace App\Http\Controllers;

use CRUDBooster;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Statistic extends \crocodicstudio\crudbooster\controllers\CBController
{




    public static function add(){



        $list = array();
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
		$list = array_merge($list, $ip);
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
		$list = array_merge($list, $ip);
	} elseif (!empty($_SERVER['REMOTE_ADDR'])) {
		$list[] = $_SERVER['REMOTE_ADDR'];
	}
	$list = implode(',', array_unique($list));





        $userid=CRUDBooster::myId();
        $url=$_SERVER['REQUEST_URI'];
        $ip=$list;
        $more='jjjj';
        
    DB::table('statistic')->insert(
        array('userid' => $userid, 'url' => $url, 'ip' => $ip, 'more' => $more,)
    );
    }

}
