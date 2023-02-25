<?php

namespace App\Http\Controllers;

use App\Models\Eventdop;
use Illuminate\Http\Request;

/**
 * Class EventdopController
 * @package App\Http\Controllers
 */
class EventdopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventdops = Eventdop::paginate();

        return view('eventdop.index', compact('eventdops'))
            ->with('i', (request()->input('page', 1) - 1) * $eventdops->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventdop = new Eventdop();
        return view('eventdop.create', compact('eventdop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Eventdop::$rules);

        $eventdop = Eventdop::create($request->all());

        return redirect()->route('eventdops.index')
            ->with('success', 'Eventdop created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventdop = Eventdop::find($id);

        return view('eventdop.show', compact('eventdop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventdop = Eventdop::find($id);

        return view('eventdop.edit', compact('eventdop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Eventdop $eventdop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eventdop $eventdop)
    {
        request()->validate(Eventdop::$rules);

        $eventdop->update($request->all());

        return redirect()->route('eventdops.index')
            ->with('success', 'Eventdop updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $eventdop = Eventdop::find($id)->delete();

        return redirect()->route('eventdops.index')
            ->with('success', 'Eventdop deleted successfully');
    }
}
