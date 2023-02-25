<?php

namespace App\Http\Controllers;

use App\Models\Mopcompetition;
use Illuminate\Http\Request;

/**
 * Class MopcompetitionController
 * @package App\Http\Controllers
 */
class MopcompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mopcompetitions = Mopcompetition::paginate();

        return view('mopcompetition.index', compact('mopcompetitions'))
            ->with('i', (request()->input('page', 1) - 1) * $mopcompetitions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mopcompetition = new Mopcompetition();
        return view('mopcompetition.create', compact('mopcompetition'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Mopcompetition::$rules);

        $mopcompetition = Mopcompetition::create($request->all());

        return redirect()->route('mopcompetitions.index')
            ->with('success', 'Mopcompetition created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mopcompetition = Mopcompetition::find($id);

        return view('mopcompetition.show', compact('mopcompetition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mopcompetition = Mopcompetition::find($id);

        return view('mopcompetition.edit', compact('mopcompetition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Mopcompetition $mopcompetition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mopcompetition $mopcompetition)
    {
        request()->validate(Mopcompetition::$rules);

        $mopcompetition->update($request->all());

        return redirect()->route('mopcompetitions.index')
            ->with('success', 'Mopcompetition updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mopcompetition = Mopcompetition::find($id)->delete();

        return redirect()->route('mopcompetitions.index')
            ->with('success', 'Mopcompetition deleted successfully');
    }
}
