<?php

namespace Database\Factories;

use App\Models\Conference;
use App\Models\ConferenceRoom;
use App\Models\Talk;
use Illuminate\Database\Eloquent\Factories\Factory;

class TalkFactory extends Factory
{
    protected $model = Talk::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(3),
            'start_time' => $this->faker->dateTimeBetween('now', '+1 week'),
            'end_time' => $this->faker->dateTimeBetween('+1 week', '+2 weeks'),
            'speaker' =>  Conference::latest()->first()->speakers->get()->random(),
            'conference_room_id' => Conference::latest()->first()->rooms->random(),
        ];
    }
}
