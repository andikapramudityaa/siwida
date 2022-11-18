<?php

namespace App\Http\Controllers;

use App\Models\RequestTourism;
use App\Http\Requests\StoreRequestTourismRequest;
use App\Http\Requests\UpdateRequestTourismRequest;

class RequestTourismController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->guest()) {
            return redirect('/login')->with('loginError', 'Perlu login untuk membuat permintaan');
        }

        return view('request', [
            'pageTitle' => 'Permintaan Wisata'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRequestTourismRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequestTourismRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestTourism  $requestTourism
     * @return \Illuminate\Http\Response
     */
    public function show(RequestTourism $requestTourism)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestTourism  $requestTourism
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestTourism $requestTourism)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRequestTourismRequest  $request
     * @param  \App\Models\RequestTourism  $requestTourism
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequestTourismRequest $request, RequestTourism $requestTourism)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestTourism  $requestTourism
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestTourism $requestTourism)
    {
        //
    }
}
