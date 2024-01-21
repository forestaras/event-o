<?php

namespace App\Http\Controllers\CpController;

use App\Http\Controllers\Controller;
use App\Models\CP\CPpointClass as CPpointClass;
// use App\Models\CPpointClass;
use Illuminate\Http\Request;

/**
 * Class CPpointClassController
 * @package App\Http\Controllers
 */
class CPpointClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cPpointClasses = CPpointClass::paginate();

        return view('c-ppoint-class.index', compact('cPpointClasses'))
            ->with('i', (request()->input('page', 1) - 1) * $cPpointClasses->perPage());
    }
    public function index2($id)
    {
        $cPpointClasses = CPpointClass::where('cid',$id)->get();

        return $cPpointClasses;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cPpointClass = new CPpointClass();
        return view('c-ppoint-class.create', compact('cPpointClass'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CPpointClass::$rules);

        $cPpointClass = CPpointClass::create($request->all());

        return redirect()->route('c-pcompetitions.show',$request->cid)
            ->with('success', 'CPpointClass created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cPpointClass = CPpointClass::find($id);

        return view('c-ppoint-class.show', compact('cPpointClass'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cPpointClass = CPpointClass::find($id);

        return view('c-ppoint-class.edit', compact('cPpointClass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CPpointClass $cPpointClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CPpointClass $cPpointClass)
    {
        request()->validate(CPpointClass::$rules);

        $cPpointClass->update($request->all());

        return redirect()->route('c-pcompetitions.show',$request->cid)
            ->with('success', 'CPpointClass created successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cPpointClass = CPpointClass::find($id)->delete();

        return redirect()->route('c-ppoint-classes.index')
            ->with('success', 'CPpointClass deleted successfully');
    }
}
