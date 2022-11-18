<?php

namespace Database\Seeders;

use App\Models\Tourism;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourismSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tourism::create([
            'name' => 'Testing',
            'village_id' => 1,
            'slug' => 'Testing',
            'image' => '',
            'daysOpen' => 'Senin s/d Minggu',
            'hoursOpen' => '08.00 s/d 15.00',
            'fee' => '15.000',
            'facility' => 'Mushola & Rest Area',
            'lat' => 1233123,
            'lng' => 32133.1
        ]);

        Tourism::create([
            'name' => 'Testing2',
            'village_id' => 2,
            'slug' => 'Testing2',
            'image' => '',
            'daysOpen' => 'Senin s/d Minggu',
            'hoursOpen' => '08.00 s/d 15.00',
            'fee' => '15.000',
            'facility' => 'Mushola & Rest Area',
            'lat' => 1233123,
            'lng' => 32133.1
        ]);

        Tourism::create([
            'name' => 'Testing3',
            'village_id' => 1,
            'slug' => 'Testing3',
            'image' => '',
            'daysOpen' => 'Senin s/d Minggu',
            'hoursOpen' => '08.00 s/d 15.00',
            'fee' => '15.000',
            'facility' => 'Mushola & Rest Area',
            'lat' => 1233123,
            'lng' => 32133.1
        ]);
    }
}
