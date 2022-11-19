<?php

namespace App\Http\Controllers;

use App\Models\Tourism;

class TourismController extends Controller
{
    public function getTourism(Tourism $tourism)
    {
        return view('tourism', [
            'pageTitle' => 'Wisata',
            'tourism' => $tourism->load('village')
        ]);
    }
}
