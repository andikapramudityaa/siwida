<?php

namespace Database\Seeders;

use App\Models\Village;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Village::create([
            'name' => 'Barengkok',
            'slug' => 'Barengkok',
        ]);

        Village::create([
            'name' => 'Cibeber I',
            'slug' => 'Cibeber-I',
        ]);

        Village::create([
            'name' => 'Cibeber II',
            'slug' => 'Cibeber-II',
        ]);

        Village::create([
            'name' => 'Karacak',
            'slug' => 'Karacak',
        ]);

        Village::create([
            'name' => 'Karehkel',
            'slug' => 'Karehkel',
        ]);

        Village::create([
            'name' => 'Karyasari',
            'slug' => 'Karyasari',
        ]);

        Village::create([
            'name' => 'Leuwiliang',
            'slug' => 'Leuwiliang',
        ]);

        Village::create([
            'name' => 'Leuwimekar',
            'slug' => 'Leuwimekar',
        ]);

        Village::create([
            'name' => 'Pabangbon',
            'slug' => 'Pabangbon',
        ]);

        Village::create([
            'name' => 'Purasari',
            'slug' => 'Purasari',
        ]);

        Village::create([
            'name' => 'Puraseda',
            'slug' => 'Puraseda',
        ]);
    }
}
