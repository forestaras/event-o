<?php

namespace App\Http\Controllers\CpController;
use App\Http\Controllers\Controller;
use App\Models\CP\CPclass;
// use App\Models\CPclass;
use Illuminate\Http\Request;

/**
 * Class CPclassController
 * @package App\Http\Controllers
 */
class CPclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cPclasses = CPclass::paginate();

        return view('c-pclass.index', compact('cPclasses'))
            ->with('i', (request()->input('page', 1) - 1) * $cPclasses->perPage());
    }

    public function index2($id)
    {
        $cPclasses = CPclass::where('cid',$id)->get();

        return  $cPclasses;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cPclass = new CPclass();
        return view('c-pclass.create', compact('cPclass'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CPclass::$rules);

        $cPclass = CPclass::create($request->all());

        return redirect()->route('c-pclasses.index',$request->cid)
            ->with('success', 'CPclass created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cPclass = CPclass::find($id);

        return view('c-pclass.show', compact('cPclass'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cPclass = CPclass::find($id);

        return view('c-pclass.edit', compact('cPclass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CPclass $cPclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CPclass $cPclass)
    {
        request()->validate(CPclass::$rules);

        $cPclass->update($request->all());

        return redirect()->route('c-pclasses.index',$request->cid)
            ->with('success', 'CPclass updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cPclass = CPclass::find($id)->delete();

        return redirect()->route('c-pclasses.index')
            ->with('success', 'CPclass deleted successfully');
    }
}
