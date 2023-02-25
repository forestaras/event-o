<?php

namespace App\Http\Controllers;

use App\Models\Obl;
use Illuminate\Http\Request;

/**
 * Class OblController
 * @package App\Http\Controllers
 */
class OblController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obls = Obl::paginate();

        return view('obl.index', compact('obls'))
            ->with('i', (request()->input('page', 1) - 1) * $obls->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obl = new Obl();
        return view('obl.create', compact('obl'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Obl::$rules);

        $obl = Obl::create($request->all());

        return redirect()->route('obls.index')
            ->with('success', 'Obl created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obl = Obl::find($id);

        return view('obl.show', compact('obl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obl = Obl::find($id);

        return view('obl.edit', compact('obl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Obl $obl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obl $obl)
    {
        request()->validate(Obl::$rules);

        $obl->update($request->all());

        return redirect()->route('obls.index')
            ->with('success', 'Obl updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $obl = Obl::find($id)->delete();

        return redirect()->route('obls.index')
            ->with('success', 'Obl deleted successfully');
    }
}
