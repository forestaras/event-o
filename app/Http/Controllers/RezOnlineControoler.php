<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class RezOnlineControoler extends Controller
{
    function formatTime($time)
	{ //формат часу
		$time = $time / 10;
		if ($time > 3600)
			return sprintf("%d:%02d:%02d", $time / 3600, ($time / 60) % 60, $time % 60);
		elseif ($time > 0)
			return sprintf("%2d:%02d", ($time / 60) % 60, $time % 60);
		else
			return '0:00';
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cid)
    {
        $grups = DB::table('mopclass')->where('cid', $cid)->get();
        return view('layouts.create',compact('grups','cid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
 
            'name' => 'required',
 
            ]);
            $cid=$request->cid;
            $peopless = DB::table('mopcompetitor')->where('cid', $cid)->get(); // виймаємо учасників
            $id= $peopless->count()+101;


            $clubs = DB::table('moporganization')->where('cid', $cid)->get()->count();
            $club = DB::table('moporganization')->where('cid', $cid)->where('name', $request->club)->first();
            if($club->name){
            $clubid=$club->id;
            }
            else{
                DB::table('moporganization')->insert(
                    [ 'cid' =>$cid, 'id' =>$clubs+1,'name' => $request->club]
                );
                $clubid=$clubs+1;
            }

            $grupss = DB::table('mopclass')->where('cid', $cid)->get();
            $grup = DB::table('mopclass')->where('cid', $cid)->where('name', $request->grup)->first();
            if($grup->name){
                $grupid=$grup->id;
                }
                else{
                    DB::table('mopclass')->insert(
                        [ 'cid' =>$cid, 'id' =>$grupss->count()+1,'name' => $request->grup]
                    );
                    $grupid=$grupss->count()+1;
                }


                $timest=$request->start;
                $t = 0;
               foreach(explode(":",$timest) as $v)
               $t = $t*60 + $v;  
                $t *= 10;
                $st=$t;


                $timert=$request->finish;
                $t = 0;
               foreach(explode(":",$timert) as $v)
               $t = $t*60 + $v;  
                $t *= 10;

                $rt=$t-$st;

            
            


         
            // Post::create($request->all());
            // $grupss = DB::table('mopclass')->where('cid', $id)->get();
		// $event = DB::table('mopcompetition')->where('cid', $id)->first();
		// $clubs = DB::table('moporganization')->where('cid', $id)->get();
		// $grups = DB::table('mopclass')->where('cid', $id)->where('name', $grup)->first(); // виймаємо группу 
            DB::table('mopcompetitor')->insert(
                [ 'cid' =>$cid, 'id' =>$id,'name' => $request->name,'org' =>$clubid, 'cls' => $grupid,'st' => $st,'rt' => $rt,'stat'=>$request->stat,]
            );
     
            return redirect('rezonline/'.$cid)->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cid)
    {
        $peoples = DB::table('mopcompetitor')->where('cid', $cid)->orderBy('id', 'DECK')->get(); // виймаємо учасників
       
        $grups = DB::table('mopclass')->where('cid', $cid)->get();
        $clubs = DB::table('moporganization')->where('cid', $cid)->get();
        

        foreach ($peoples as $people) {

            $people->grup=$grups->where('id', $people->cls)->first();
            $people->club=$clubs->where('id', $people->org)->first();
            $people->start=RezOnlineControoler::formatTime($people->st);
            $people->rez=RezOnlineControoler::formatTime($people->rt);
            $people->finish=RezOnlineControoler::formatTime($people->rt+$people->st);
        }
        
        return view('layouts.show',compact('peoples','cid','grups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cid,$id)
    {
        $grups = DB::table('mopclass')->where('cid', $cid)->get();
        return view('layouts.edit',compact('grups','cid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cid,$id)
    {
        // $teetime = Teetime::where('date', '=', $formattedDate);
        DB::table('mopcompetitor')->where('cid', $cid)->where('id', $id)->delete();
        // DB::delete("delete from mopcompetitor where id=".[$id].",cid=".[$cid]);
 
 
        return redirect('/rezonline/'.$cid)
 
                ->with('success','Post deleted successfully');
    }
}
