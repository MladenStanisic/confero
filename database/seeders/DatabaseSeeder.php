<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Role::create(['name' => 'organizer']);
        Role::create(['name' => 'speaker']);
        Role::create(['name' => 'attendee']);
        \App\Models\Conference::factory(1)->create();
        \App\Models\ConferenceRoom::factory()->count(10)->create();
        \App\Models\Talk::factory(10)->create();

    }
}
