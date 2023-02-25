<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;

/**
 * Class RegisterController
 * @package App\Http\Controllers
 */
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registers = Register::paginate();

        return view('register.index', compact('registers'))
            ->with('i', (request()->input('page', 1) - 1) * $registers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $register = new Register();
        return view('register.create', compact('register'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Register::$rules);

        $register = Register::create($request->all());

        return redirect()->route('registers.index')
            ->with('success', 'Register created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $register = Register::find($id);

        return view('register.show', compact('register'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $register = Register::find($id);

        return view('register.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Register $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register $register)
    {
        request()->validate(Register::$rules);

        $register->update($request->all());

        return redirect()->route('registers.index')
            ->with('success', 'Register updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $register = Register::find($id)->delete();

        return redirect()->route('registers.index')
            ->with('success', 'Register deleted successfully');
    }
}
