<?php

namespace App\Http\Controllers;

use App\Models\RequestTourism;
use App\Models\Village;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RequestTourismController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tourism.request', [
            'pageTitle' => 'Permintaan Wisata',
            'requestTourisms' => RequestTourism::all()
        ]);
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
            'pageTitle' => 'Permintaan Wisata',
            'villages' => Village::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'village_id' => 'required',
            'user_id' => 'required',
            'name' => 'required|unique:tourisms|max:255',
            'daysOpen' => 'required|max:255',
            'hoursOpen' => 'required|max:255',
            'fee' => 'required',
            'facility' => 'required|max:255',
            'lat' => 'required',
            'lng' => 'required',
            'image' => 'image|file|max:1024',
            'type' => 'required'
        ]);

        if ($request->type == 1) {
            $validatedData['type'] = "Tambah";
        } else {
            $validatedData['type'] = "Ubah";
        }

        $validatedData['slug'] = Str::replace(' ', '-', $validatedData['name']);
        $validatedData['image'] = $request->file('image')->store('req-tourism-img');

        dd($validatedData);
        // RequestTourism::create($validatedData);

        // return redirect('/')->with('success', 'Permintaan Berhasil Dikirim');
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
     * @param  \App\Models\RequestTourism  $requestTourism
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestTourism $requestTourism)
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
