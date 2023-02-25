<?php
namespace App\Http\Controllers;

use DB;
class SetingController extends Controller 
{
			static function seting()
        {
    	    $seting['sitename'] = DB::table('cms_settings')->where('name','appname')->first();
    	 $menusid = DB::table('cms_menus_privileges')->where('id_cms_privileges','5')->get();
    	 foreach ($menusid as $menuid) {
    	 	$menu=DB::table('cms_menus')->where('id',$menuid->id_cms_menus)->first();
    	 	if ($menu->name){
    	 		$seting['menus'][]=$menu;
    	 	}
        }
        return $seting; 
    }
}