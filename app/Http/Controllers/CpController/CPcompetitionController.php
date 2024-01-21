<?php

namespace App\Http\Controllers\CpController;

use App\Http\Controllers\Controller;
use App\Models\CP\CPcompetition; 
use App\Models\CPcompetition as ModelsCPcompetition;
use Illuminate\Http\Request;

/**
 * Class CPcompetitionController
 * @package App\Http\Controllers
 */
class CPcompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cPcompetitions = CPcompetition::paginate();

        return view('c-pcompetition.index', compact('cPcompetitions'))
            ->with('i', (request()->input('page', 1) - 1) * $cPcompetitions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cPcompetition = new CPcompetition();
        return view('c-pcompetition.create', compact('cPcompetition'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CPcompetition::$rules);

        $cPcompetition = CPcompetition::create($request->all());

        return redirect()->route('c-pcompetitions.index')
            ->with('success', 'CPcompetition created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cPcompetition = CPcompetition::find($id);

        return view('c-pcompetition.show', compact('cPcompetition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cPcompetition = CPcompetition::find($id);

        return view('c-pcompetition.edit', compact('cPcompetition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CPcompetition $cPcompetition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CPcompetition $cPcompetition)
    {
        request()->validate(CPcompetition::$rules);

        $cPcompetition->update($request->all());

        return redirect()->route('c-pcompetitions.index')
            ->with('success', 'CPcompetition updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cPcompetition = CPcompetition::find($id)->delete();

        return redirect()->route('c-pcompetitions.index')
            ->with('success', 'CPcompetition deleted successfully');
    }
}
