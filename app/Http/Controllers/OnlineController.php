<?php

namespace App\Http\Controllers;

use App\Models\Online;
use Illuminate\Http\Request;

/**
 * Class OnlineController
 * @package App\Http\Controllers
 */
class OnlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onlines = Online::paginate();

        return view('online.index', compact('onlines'))
            ->with('i', (request()->input('page', 1) - 1) * $onlines->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $online = new Online();
        return view('online.create', compact('online'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Online::$rules);

        $online = Online::create($request->all());

        return redirect()->route('onlines.index')
            ->with('success', 'Online created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $online = Online::find($id);

        return view('online.show', compact('online'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $online = Online::find($id);

        return view('online.edit', compact('online'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Online $online
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Online $online)
    {
        request()->validate(Online::$rules);

        $online->update($request->all());

        return redirect()->route('onlines.index')
            ->with('success', 'Online updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $online = Online::find($id)->delete();

        return redirect()->route('onlines.index')
            ->with('success', 'Online deleted successfully');
    }
}
