<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    public function getVillage(Village $village)
    {
        return view('village', [
            'pageTitle' => 'Desa',
            'village' => $village,
            'tourisms' => $village->tourism
        ]);
    }
}
