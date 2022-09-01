<?php

namespace App\Http\Controllers;

use App\Models\Competencias;
use Illuminate\Http\Request;

class CompetenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('competencias.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('competencias.create');
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
     * @param  \App\Models\Competencias  $competencias
     * @return \Illuminate\Http\Response
     */
    public function show($competencia)
    {
        return view('competencias.show',Compact('competencia')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competencias  $competencias
     * @return \Illuminate\Http\Response
     */
    public function edit(Competencias $competencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Competencias  $competencias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competencias $competencias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competencias  $competencias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competencias $competencias)
    {
        //
    }
}
