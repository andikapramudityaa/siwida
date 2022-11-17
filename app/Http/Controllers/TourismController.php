<?php

namespace App\Http\Controllers;

use App\Models\Tourism;
use App\Http\Requests\StoreTourismRequest;
use App\Http\Requests\UpdateTourismRequest;

class TourismController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @param  \App\Http\Requests\StoreTourismRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTourismRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tourism  $tourism
     * @return \Illuminate\Http\Response
     */
    public function show(Tourism $tourism)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tourism  $tourism
     * @return \Illuminate\Http\Response
     */
    public function edit(Tourism $tourism)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTourismRequest  $request
     * @param  \App\Models\Tourism  $tourism
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTourismRequest $request, Tourism $tourism)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tourism  $tourism
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tourism $tourism)
    {
        //
    }
}
