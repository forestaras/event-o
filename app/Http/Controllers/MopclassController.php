<?php

namespace App\Http\Controllers;

use App\Models\Mopclass;
use Illuminate\Http\Request;

/**
 * Class MopclassController
 * @package App\Http\Controllers
 */
class MopclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mopclasses = Mopclass::paginate();

        return view('mopclass.index', compact('mopclasses'))
            ->with('i', (request()->input('page', 1) - 1) * $mopclasses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mopclass = new Mopclass();
        return view('mopclass.create', compact('mopclass'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Mopclass::$rules);

        $mopclass = Mopclass::create($request->all());

        return redirect()->route('mopclasses.index')
            ->with('success', 'Mopclass created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mopclass = Mopclass::find($id);

        return view('mopclass.show', compact('mopclass'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mopclass = Mopclass::find($id);

        return view('mopclass.edit', compact('mopclass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Mopclass $mopclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mopclass $mopclass)
    {
        request()->validate(Mopclass::$rules);

        $mopclass->update($request->all());

        return redirect()->route('mopclasses.index')
            ->with('success', 'Mopclass updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mopclass = Mopclass::find($id)->delete();

        return redirect()->route('mopclasses.index')
            ->with('success', 'Mopclass deleted successfully');
    }
}
