<?php

namespace App\Http\Controllers;

use App\Models\CPcompetitions;
use Illuminate\Http\Request; 

class CPcompetitionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cPcompetitions = new CPcompetitions();

        // Заповнення полів
        $cPcompetitions->name = $_GET['name'];
        $cPcompetitions->data = $_GET['dni'];
        $cPcompetitions->pass = $_GET['pass'];
        
        // Збереження запису в базі даних
        $cPcompetitions->save();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CPcompetitions  $cPcompetitions
     * @return \Illuminate\Http\Response
     */
    public function show(CPcompetitions $cPcompetitions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CPcompetitions  $cPcompetitions
     * @return \Illuminate\Http\Response
     */
    public function edit(CPcompetitions $cPcompetitions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CPcompetitions  $cPcompetitions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CPcompetitions $cPcompetitions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CPcompetitions  $cPcompetitions
     * @return \Illuminate\Http\Response
     */
    public function destroy(CPcompetitions $cPcompetitions)
    {
        //
    }
}
