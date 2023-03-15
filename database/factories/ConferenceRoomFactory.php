<?php

namespace Database\Factories;

use App\Models\Conference;
use App\Models\ConferenceRoom;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConferenceRoomFactory extends Factory
{
    protected $model = ConferenceRoom::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'conference_id' => Conference::latest('id')->value('id'),
            'capacity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
