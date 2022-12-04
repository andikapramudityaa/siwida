<?php

namespace App\Http\Controllers;

use App\Models\Tourism;
use App\Models\Village;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'pageTitle' => 'Beranda',
            'villages' => Village::all(),
            'tourisms' => Tourism::with('village')->latest()->filter(request(['search']))->paginate(5)->withQueryString()
        ]);
    }

    public function getVillage(Village $village)
    {
        return view('home', [
            'pageTitle' => 'Desa ' . $village->name,
            'villages' => Village::all(),
            'tourisms' => Tourism::where('village_id', $village->id)->latest()->filter(request(['search']))->paginate(5)->withQueryString()
        ]);
    }
}
