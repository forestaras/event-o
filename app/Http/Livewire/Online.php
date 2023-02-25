<?php

namespace App\Http\Livewire;
// use DB;

use App\Http\Controllers\LiveRezultsController;
use App\Models\Mopclass;
use App\Models\Mopcompetition;
use App\Models\Mopcompetitor;
use App\Models\Moporganization;
use Livewire\Component;

class Online extends Component
{
    public $max_timestamp;
    public $x;
    public $cid;
    public $cls;

    public function mount()
    {
        $peoples = Mopcompetitor::where('cid', $this->cid)->where('cls', $this->cls)->get();
        $сlubs = Moporganization::where('cid', $this->cid)->get();
        $eventt = Mopcompetition::where('cid', $this->cid)->first();
        $grups = Mopclass::where('cid', $this->cid)->get();
        // $max_timestamp = $peoples->max('timestamp');
        $this->event=['name'=>$eventt->name,'date'=>$eventt->date,'organizer'=>$eventt->organizer,'homepage'=>$eventt->homepage];

        foreach ($peoples as $people) {
            $people->club = $сlubs->where('id', $people->org)->first()->name;
            $people->grup = $grups->where('id', $people->cls)->first()->name;
            // $people->time = $this->formatTime($people->rt);
            
        }

        foreach ($peoples as $people) {
            $people_arr[] = [
                'id' => $people->id,
                'name' => $people->name,
                'club' => $people->club,
                'grup' => $people->grup,
                'grup_id' => $people->cls,
                'club_id' => $people->org,
                'stat' => $people->stat,
                'st' => $people->st,
                'rt' => $people->rt,
                'time' => $people->time,
                'timestamp' => $people->timestamp
            ];
        }

        $this->max_timestamp = 00001;
        $this->people_arr = $people_arr;

    }




    public function render()
    {
   
        $peoples_arr=$this->people_arr;
        
        $max_timestamp2 = Mopcompetitor::where('cid', $this->cid)->where('cls',$this->cls)->max('timestamp');
        $max_timestamp2= date_format(date_create($max_timestamp2), 'U');
        // echo $max_timestamp2;
        // echo $this->max_timestamp;
        if ($max_timestamp2==$this->max_timestamp) {// Якщо остання запись раніше тоді переписати результати всім
            
            $people=$peoples_arr;
        }
        else{
            $data_start=date_format(date_create($this->event['date']),'U');
        

            $peoples2 = Mopcompetitor::where('cid', $this->cid)->where('cls', $this->cls)->select('id','st','rt','stat','timestamp')->get();
            $mistse_obj=LiveRezultsController::mistse_obj($peoples2);
            $vidst_obj=LiveRezultsController::vidst_obj($peoples2);
            $pozition_sort_obj=LiveRezultsController::pozition_sort_obj($peoples2,$data_start);


            foreach ($peoples2 as $p) {
                $p->rez=LiveRezultsController::time_format_rez_stat($p->rt,$p->stat);
                $p->start=LiveRezultsController::time_format_start($p->st);
                $p->data_timer=LiveRezultsController::time_format_rez_timer($data_start,$p->st);
                $p->color=LiveRezultsController::color($p->timestamp);
                $p->vidst=$vidst_obj->where('id',$p->id)->first()->vidst;
                $p->mistse=$mistse_obj->where('id',$p->id)->first()->mistse;
                $p->sort=$pozition_sort_obj->where('id',$p->id)->first()->sort;    

            }

            foreach ($peoples_arr as $people) {
                $rez=array('rez' =>$peoples2->where('id',$people['id'])->first()->rez);
                $color=array('color' =>$peoples2->where('id',$people['id'])->first()->color);
                $start=array('start' =>$peoples2->where('id',$people['id'])->first()->start);
                $data_timer=array('data_timer' =>$peoples2->where('id',$people['id'])->first()->data_timer);
                $vidst=array('vidst' =>$peoples2->where('id',$people['id'])->first()->vidst);
                $mistse=array('mistse' =>$peoples2->where('id',$people['id'])->first()->mistse);
                $sort=array('sort' =>$peoples2->where('id',$people['id'])->first()->sort);
                $people = array_replace($people,$rez, $start, $vidst, $mistse,  $data_timer,$sort,$color);
                $peo[]=$people;
            }
            $people=$peo;
            
        }
        $sort  = array_column($people, 'sort');
        // $start = array_column($people, 'st');
        array_multisort($sort, SORT_ASC, $people);
        $this->people_arr = $people;
        $this->max_timestamp=$max_timestamp2;
        return view('livewire.online');
    }
}
