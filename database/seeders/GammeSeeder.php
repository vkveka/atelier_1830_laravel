<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gamme;

class GammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gamme::create([
            'name' => 'coussin',
            'image' => 'gamme_coussin.jpg',
        ]);

        Gamme::create([
            'name' => 'rideau',
            'image' => 'fermeture_lit.jpeg',
        ]);

        Gamme::create([
            'name' => 'autre',
            'image' => 'background.jpeg',
        ]);
    }
}
