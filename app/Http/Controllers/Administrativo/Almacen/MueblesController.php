<?php

namespace App\Http\Controllers\Administrativo\Almacen;

use App\Administrativo\Almacen\muebles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class MueblesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd("Bienes, muebles e inmuebles");
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
     * @param  \App\muebles  $muebles
     * @return \Illuminate\Http\Response
     */
    public function show(muebles $muebles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\muebles  $muebles
     * @return \Illuminate\Http\Response
     */
    public function edit(muebles $muebles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\muebles  $muebles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, muebles $muebles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\muebles  $muebles
     * @return \Illuminate\Http\Response
     */
    public function destroy(muebles $muebles)
    {
        //
    }
}
