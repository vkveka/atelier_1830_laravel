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
            'name' => 'coussin'
        ]);

        Gamme::create([
            'name' => 'rideau'
        ]);

        Gamme::create([
            'name' => 'autre'
        ]);
    }
}
