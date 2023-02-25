<?php

namespace App\Http\Livewire;

use App\Http\Controllers\LiveRezultsController;
use App\Models\Mopclass;
use App\Models\Mopcompetition;
use App\Models\Mopcompetitor;
use App\Models\Moporganization;
use Livewire\Component;

class OnlineFinisher extends Component
{
    public $cid;
    public function mount()
    {

        $peoples = Mopcompetitor::where('cid', $this->cid)->orderByDesc('timestamp')->get();
        $сlubs = Moporganization::where('cid', $this->cid)->get();
        $grups = Mopclass::where('cid', $this->cid)->get();
        foreach ($peoples as $people) {
            $people->club = $сlubs->where('id', $people->org)->first()->name;
            $people->grup = $grups->where('id', $people->cls)->first()->name;
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

        $this->max_timestamp = '2000-11-02 17:11:58';
        $this->people_arr = $people_arr;
    }


    public function render()
    {
        $peoples_arr = $this->people_arr;

        $max_timestamp2 = Mopcompetitor::where('cid', $this->cid)->max('timestamp');
        if ($max_timestamp2 > $this->max_timestamp) {
            $peoples2 = Mopcompetitor::where('cid', $this->cid)->orderByDesc('timestamp')->limit(5)->select('id', 'st', 'rt', 'stat', 'timestamp')->get();
            foreach ($peoples2 as $p) {
                $p->rez = LiveRezultsController::time_format_rez_stat($p->rt, $p->stat);
                $p->start = LiveRezultsController::time_format_start($p->st);
                foreach ($peoples_arr as $pp) {
                    if ($p->id == $pp['id']) {
                        $p->club =  $pp['club'];
                        $p->name = $pp['name'];
                        $p->grup = $pp['grup'];
                        $p->cls = $pp['grup_id'];
                        
                    }
                }
            }
         $this->pe = $peoples2;
        } 
        else {
            $peoples2=$this->pe;
            foreach ($peoples2 as $p) {
                $p->rez = LiveRezultsController::time_format_rez_stat($p->rt, $p->stat);
                $p->start = LiveRezultsController::time_format_start($p->st);
                foreach ($peoples_arr as $pp) {
                    if ($p->id == $pp['id']) {
                        $p->club =  $pp['club'];
                        $p->name = $pp['name'];
                        $p->grup = $pp['grup'];
                        $p->cls = $pp['grup_id'];
                    }
                }
            }
        }
        $this->pe = $peoples2;
        $this->max_timestamp = $max_timestamp2;
        return view('livewire.online-finisher');
    }
}
