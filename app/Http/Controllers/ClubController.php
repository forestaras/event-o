<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

/**
 * Class ClubController
 * @package App\Http\Controllers
 */
class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = Club::paginate();

        return view('club.index', compact('clubs'))
            ->with('i', (request()->input('page', 1) - 1) * $clubs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $club = new Club();
        return view('club.create', compact('club'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Club::$rules);

        $club = Club::create($request->all());

        return redirect()->route('clubs.index')
            ->with('success', 'Club created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $club = Club::find($id);

        return view('club.show', compact('club'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $club = Club::find($id);

        return view('club.edit', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Club $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        request()->validate(Club::$rules);

        $club->update($request->all());

        return redirect()->route('clubs.index')
            ->with('success', 'Club updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $club = Club::find($id)->delete();

        return redirect()->route('clubs.index')
            ->with('success', 'Club deleted successfully');
    }
}
