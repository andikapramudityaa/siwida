<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RequestTourism;
use Illuminate\Support\Facades\Storage;

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
            'requestTourisms' => RequestTourism::with('village', 'user')->latest()
                ->filter(request(['search']))->paginate(5)->withQueryString()
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'village_id' => 'required',
            'name' => 'required|unique:request_tourisms|max:255',
            'daysOpen' => 'required|max:255',
            'hoursOpen' => 'required|max:255',
            'fee' => 'required',
            'facility' => 'required|max:255',
            'desc' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'type' => 'required'
        ]);

        if ($request->type == 1) {
            $validatedData['type'] = "Tambah";
        } else {
            $validatedData['type'] = "Ubah";
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = Str::replace(' ', '-', $validatedData['name']);
        $validatedData['image'] = $request->file('image')->store('req-tourism-img');

        RequestTourism::create($validatedData);

        return back()->with('success', 'Permintaan Berhasil Dikirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestTourism  $requestTourism
     * @return \Illuminate\Http\Response
     */
    public function show(RequestTourism $requestTourism)
    {
        return view('admin.tourism.request.read', [
            'pageTitle' => 'Baca Permintaan',
            'requestTourism' => $requestTourism->load('village', 'user')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestTourism  $requestTourism
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestTourism $requestTourism)
    {
        Storage::delete($requestTourism->image);

        RequestTourism::destroy($requestTourism->id);

        return redirect('/admin/requests')->with('success', 'Permintaan Berhasil Dihapus');
    }
}
