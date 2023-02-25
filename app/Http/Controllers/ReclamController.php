<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reclam;
use Illuminate\Http\Request;

/**
 * Class ReclamController
 * @package App\Http\Controllers
 */
class ReclamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reclams = Reclam::paginate();

        return view('reclam.index', compact('reclams'))
            ->with('i', (request()->input('page', 1) - 1) * $reclams->perPage());
    }

    static function index_show()
    {
        $date1 = date('Y-m-d', strtotime("+14 day"));
        $date2 = date('Y-m-d');
        $blocs = (object)[];
        $blocs->events = Event::where('datastart','<',$date1)->where('datastart','>=',$date2)->paginate(3)->sortByDesc('data_start');
        $blocs->reclams = Reclam::where('activ','>',0)->where('data_finish','>',date('Y-m-d H:i:s'))->paginate(3)->sortByDesc('prioritet');
        foreach( $blocs->events as $event ){
            $event->data = date_format(date_create($event->datastart), "d.m.Y");
            if ($event->datafinish != 0) {
                $m1 = date_format(date_create($event->datafinish), "m");
                $m2 = date_format(date_create($event->datastart), "m");

                if ($m1 != $m2) {
                    $event->data = date_format(date_create($event->datastart), "d.m-") . date_format(date_create($event->datafinish), "d.m.Y");
                }
                if ($m1 == $m2) {
                    $event->data = date_format(date_create($event->datastart), "d-") . date_format(date_create($event->datafinish), "d.m.Y");
                }
            } else {
                $event->data = date_format(date_create($event->datastart), "d.m.Y");
            }
            if ($date2>=$event->datastart and $date2<=$event->datafinish) {
                $event->color='bg-success';
            }
            else {
                $event->color='bg-primary';
            }
            

        }
        return $blocs;
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reclam = new Reclam();
        return view('reclam.create', compact('reclam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Reclam::$rules);

        $reclam = Reclam::create($request->all());

        return redirect()->route('reclams.index')
            ->with('success', 'Reclam created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reclam = Reclam::find($id);

        return view('reclam.show', compact('reclam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reclam = Reclam::find($id);

        return view('reclam.edit', compact('reclam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Reclam $reclam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reclam $reclam)
    {
        request()->validate(Reclam::$rules);

        $reclam->update($request->all());

        return redirect()->route('reclams.index')
            ->with('success', 'Reclam updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $reclam = Reclam::find($id)->delete();

        return redirect()->route('reclams.index')
            ->with('success', 'Reclam deleted successfully');
    }
}
