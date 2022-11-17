<?php

namespace App\Http\Controllers;

use App\Models\Tourism;
use App\Models\Village;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'pageTitle' => 'Beranda',
            'villages' => Village::all(),
            'tourisms' => Tourism::all()
        ]);
    }
}
