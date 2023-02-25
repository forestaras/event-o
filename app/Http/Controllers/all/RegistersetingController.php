<?php

namespace App\Http\Controllers;

use App\Models\Registerseting;
use Illuminate\Http\Request;

/**
 * Class RegistersetingController
 * @package App\Http\Controllers
 */
class RegistersetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registersetings = Registerseting::paginate();

        return view('registerseting.index', compact('registersetings'))
            ->with('i', (request()->input('page', 1) - 1) * $registersetings->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registerseting = new Registerseting();
        return view('registerseting.create', compact('registerseting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Registerseting::$rules);

        $registerseting = Registerseting::create($request->all());

        return redirect()->route('registersetings.index')
            ->with('success', 'Registerseting created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registerseting = Registerseting::find($id);

        return view('registerseting.show', compact('registerseting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registerseting = Registerseting::find($id);

        return view('registerseting.edit', compact('registerseting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Registerseting $registerseting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registerseting $registerseting)
    {
        request()->validate(Registerseting::$rules);

        $registerseting->update($request->all());

        return redirect()->route('registersetings.index')
            ->with('success', 'Registerseting updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $registerseting = Registerseting::find($id)->delete();

        return redirect()->route('registersetings.index')
            ->with('success', 'Registerseting deleted successfully');
    }
}
