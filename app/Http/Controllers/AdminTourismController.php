<?php

namespace App\Http\Controllers;

use App\Models\RequestTourism;
use App\Models\Tourism;
use App\Models\Village;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class AdminTourismController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tourism', [
            'pageTitle' => 'Wisata',
            'tourisms' => Tourism::all(),
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
        return view('admin.tourism.create', [
            'pageTitle' => 'Tambah Wisata',
            'villages' => Village::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'village_id' => 'required',
            'name' => 'required|unique:tourisms|max:255',
            'daysOpen' => 'required|max:255',
            'hoursOpen' => 'required|max:255',
            'fee' => 'required',
            'facility' => 'required|max:255',
            'lat' => 'required',
            'lng' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        $validatedData['slug'] = Str::replace(' ', '-', $validatedData['name']);
        $validatedData['image'] = $request->file('image')->store('tourism-images');

        Tourism::create($validatedData);

        return redirect('/admin/tourisms/')->with('success', 'Wisata Berhasil Ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tourism  $tourism
     * @return \Illuminate\Http\Response
     */
    public function edit(Tourism $tourism)
    {
        return view('admin.tourism.edit', [
            'pageTitle' => 'Tambah Wisata',
            'tourism' => $tourism,
            'villages' => Village::all(),
            'tourism_village' => $tourism->village
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tourism  $tourism
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tourism $tourism)
    {
        $validatedData = $request->validate([
            'village_id' => 'required',
            'name' => [
                'required',
                'max:255',
                Rule::unique('tourisms')->ignore($tourism->id) // Ignore this rule if name doesn't change
            ],
            'daysOpen' => 'required|max:255',
            'hoursOpen' => 'required|max:255',
            'fee' => 'required',
            'facility' => 'required|max:255',
            'lat' => 'required',
            'lng' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        $validatedData['slug'] = Str::replace(' ', '-', $validatedData['name']);

        if ($request->file('image')) { // If there new image then
            Storage::delete($request->oldImage);
            $validatedData['image'] = $request->file('image')->store('tourism-images'); // Store new image
        }

        Tourism::where('id', $tourism->id)->update($validatedData);

        return redirect('/admin/tourisms/')->with('success', 'Wisata Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tourism  $tourism
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tourism $tourism)
    {
        Tourism::destroy($tourism->id);

        return redirect('/admin/tourisms')->with('success', 'Peta Wisata berhasil dihapus');
    }
}
