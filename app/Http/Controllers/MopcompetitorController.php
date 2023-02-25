<?php

namespace App\Http\Controllers;

use App\Models\Mopcompetitor;
use Illuminate\Http\Request;

/**
 * Class MopcompetitorController
 * @package App\Http\Controllers
 */
class MopcompetitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mopcompetitors = Mopcompetitor::paginate();

        return view('mopcompetitor.index', compact('mopcompetitors'))
            ->with('i', (request()->input('page', 1) - 1) * $mopcompetitors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mopcompetitor = new Mopcompetitor();
        return view('mopcompetitor.create', compact('mopcompetitor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Mopcompetitor::$rules);

        $mopcompetitor = Mopcompetitor::create($request->all());

        return redirect()->route('mopcompetitors.index')
            ->with('success', 'Mopcompetitor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mopcompetitor = Mopcompetitor::find($id);

        return view('mopcompetitor.show', compact('mopcompetitor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mopcompetitor = Mopcompetitor::find($id);

        return view('mopcompetitor.edit', compact('mopcompetitor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Mopcompetitor $mopcompetitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mopcompetitor $mopcompetitor)
    {
        request()->validate(Mopcompetitor::$rules);

        $mopcompetitor->update($request->all());

        return redirect()->route('mopcompetitors.index')
            ->with('success', 'Mopcompetitor updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mopcompetitor = Mopcompetitor::find($id)->delete();

        return redirect()->route('mopcompetitors.index')
            ->with('success', 'Mopcompetitor deleted successfully');
    }
}
