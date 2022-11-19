<?php

namespace App\Http\Controllers;

use App\Models\Tourism;
use App\Models\Village;

class VillageController extends Controller
{
    public function getVillage(Village $village)
    {
        return view('village', [
            'pageTitle' => 'Desa',
            'village' => $village,
            'tourisms' => Tourism::where('village_id', $village->id)->latest()->filter(request(['search']))->paginate(5)->withQueryString()
        ]);
    }
}
