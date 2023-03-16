<?php

namespace Database\Factories;

use App\Models\Conference;
use App\Models\Talk;
use App\Models\TalkSlide;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TalkSlide>
 */
class TalkSlideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get a random talk
        $talk = Talk::all()->random();

        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'speaker' => $talk->speaker_id,
            'talk_id' => $talk
        ];
    }
}
