<?php

namespace App\Http\Controllers;

use App\Models\Mopradio;
use Illuminate\Http\Request;

/**
 * Class MopradioController
 * @package App\Http\Controllers
 */
class MopradioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mopradios = Mopradio::paginate();

        return view('mopradio.index', compact('mopradios'))
            ->with('i', (request()->input('page', 1) - 1) * $mopradios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mopradio = new Mopradio();
        return view('mopradio.create', compact('mopradio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Mopradio::$rules);

        $mopradio = Mopradio::create($request->all());

        return redirect()->route('mopradios.index')
            ->with('success', 'Mopradio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mopradio = Mopradio::find($id);

        return view('mopradio.show', compact('mopradio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mopradio = Mopradio::find($id);

        return view('mopradio.edit', compact('mopradio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Mopradio $mopradio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mopradio $mopradio)
    {
        request()->validate(Mopradio::$rules);

        $mopradio->update($request->all());

        return redirect()->route('mopradios.index')
            ->with('success', 'Mopradio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mopradio = Mopradio::find($id)->delete();

        return redirect()->route('mopradios.index')
            ->with('success', 'Mopradio deleted successfully');
    }
}
