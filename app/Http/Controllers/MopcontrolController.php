<?php

namespace App\Http\Controllers;

use App\Models\Mopcontrol;
use Illuminate\Http\Request;

/**
 * Class MopcontrolController
 * @package App\Http\Controllers
 */
class MopcontrolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mopcontrols = Mopcontrol::paginate();

        return view('mopcontrol.index', compact('mopcontrols'))
            ->with('i', (request()->input('page', 1) - 1) * $mopcontrols->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mopcontrol = new Mopcontrol();
        return view('mopcontrol.create', compact('mopcontrol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Mopcontrol::$rules);

        $mopcontrol = Mopcontrol::create($request->all());

        return redirect()->route('mopcontrols.index')
            ->with('success', 'Mopcontrol created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mopcontrol = Mopcontrol::find($id);

        return view('mopcontrol.show', compact('mopcontrol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mopcontrol = Mopcontrol::find($id);

        return view('mopcontrol.edit', compact('mopcontrol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Mopcontrol $mopcontrol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mopcontrol $mopcontrol)
    {
        request()->validate(Mopcontrol::$rules);

        $mopcontrol->update($request->all());

        return redirect()->route('mopcontrols.index')
            ->with('success', 'Mopcontrol updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mopcontrol = Mopcontrol::find($id)->delete();

        return redirect()->route('mopcontrols.index')
            ->with('success', 'Mopcontrol deleted successfully');
    }
}
