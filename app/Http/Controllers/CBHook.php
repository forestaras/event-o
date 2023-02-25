<?php 
namespace App\Http\Controllers;

use DB;
use Session;
use Request;
// use Cookie;

class CBHook extends Controller {

	/*
	| --------------------------------------
	| Please note that you should re-login to see the session work
	| --------------------------------------
	|
	*/
	public function afterLogin() {
    return redirect(session('prevPg'));
    echo session('prevPg');
	}
}