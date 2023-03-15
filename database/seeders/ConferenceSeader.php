<?php

namespace Database\Seeders;

use App\Models\Conference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConferenceSeader extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Conference::factory()->count(10)->create();
    }
}
