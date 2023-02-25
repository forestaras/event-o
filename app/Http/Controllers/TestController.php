<?php

namespace App\Http\Controllers;
use \Illuminate\Http\Request;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class TestController extends Controller {  //Instead of Theme your own controller name
    public function autocomplete(Request $request)
{
    $term = $request->term;

    $queries = DB::table('people') //Your table name
        ->where('name', 'like', '%'.$term.'%') //Your selected row
        ->take(6)->get();
    

    foreach ($queries as $query)
    {
      $obl= DB::table('obl')->where('id',$query->oblid)->first();
      $club= DB::table('club')->where('id',$query->clubid)->first();
        $results[] = ['value' => $query->name,
                      'peopleid'=>$query->id,
                      'trener'=>$query->trener,
                      'si'=>$query->si,
                      'grup'=>$query->grup, 
                      'rik'=>$query->rik,
                      'data'=>$query->data,
                      'roz'=>$query->roz,
                      'obl'=>$obl->title,
                      'club'=>$club->title]; //you can take custom values as you want
    }
return response()->json($results);
}

	public function index()
    {   	
        return view('test');
    }





    public function autocomplete2(Request $request)
{
    $term = $request->term;

    $queries = DB::table('club') //Your table name
        ->where('title', 'like', '%'.$term.'%') //Your selected row
        ->take(6)->get();

    foreach ($queries as $query)
    {
        $results[] = ['value' => $query->title,
                     'clubid'=>$query->id,]; //you can take custom values as you want
    }
return response()->json($results);
}



public function autocomplete3(Request $request)
{
    $term = $request->term;

    $queries = DB::table('obl') //Your table name
        ->where('title', 'like', '%'.$term.'%') //Your selected row
        ->take(6)->get();

    foreach ($queries as $query)
    {
        $results[] = ['value' => $query->title,
                     'oblid'=>$query->id,]; //you can take custom values as you want
    }
return response()->json($results);
}



}