<?php

namespace App\Http\Controllers\Administrativo\Tesoreria;

use App\Model\Aministrativo\Tesoreria\bancos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class BancosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('Bancos');
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
     * @param  \App\bancos  $bancos
     * @return \Illuminate\Http\Response
     */
    public function show(bancos $bancos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bancos  $bancos
     * @return \Illuminate\Http\Response
     */
    public function edit(bancos $bancos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bancos  $bancos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bancos $bancos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bancos  $bancos
     * @return \Illuminate\Http\Response
     */
    public function destroy(bancos $bancos)
    {
        //
    }
}
