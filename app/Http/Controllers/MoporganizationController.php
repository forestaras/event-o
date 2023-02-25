<?php

namespace App\Http\Controllers;

use App\Models\Moporganization;
use Illuminate\Http\Request;

/**
 * Class MoporganizationController
 * @package App\Http\Controllers
 */
class MoporganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moporganizations = Moporganization::paginate();

        return view('moporganization.index', compact('moporganizations'))
            ->with('i', (request()->input('page', 1) - 1) * $moporganizations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $moporganization = new Moporganization();
        return view('moporganization.create', compact('moporganization'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Moporganization::$rules);

        $moporganization = Moporganization::create($request->all());

        return redirect()->route('moporganizations.index')
            ->with('success', 'Moporganization created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $moporganization = Moporganization::find($id);

        return view('moporganization.show', compact('moporganization'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $moporganization = Moporganization::find($id);

        return view('moporganization.edit', compact('moporganization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Moporganization $moporganization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Moporganization $moporganization)
    {
        request()->validate(Moporganization::$rules);

        $moporganization->update($request->all());

        return redirect()->route('moporganizations.index')
            ->with('success', 'Moporganization updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $moporganization = Moporganization::find($id)->delete();

        return redirect()->route('moporganizations.index')
            ->with('success', 'Moporganization deleted successfully');
    }
}
