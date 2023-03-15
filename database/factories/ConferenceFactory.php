<?php

namespace Database\Factories;

use App\Models\Conference;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conference>
 */
class ConferenceFactory extends Factory
{
    protected $model = Conference::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'start_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'end_date' => $this->faker->dateTimeBetween('+1 year', '+2 years'),
            'branding_logo' => $this->faker->image('public/storage/images', 400, 300, null, false),
            'branding_color' => $this->faker->hexColor,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Conference $conference) {
            $roles = Role::all();

            // Add organizer
            $organizer = User::factory()->create();
            $conference->users()->attach($organizer->id, ['role_id' => $roles->firstWhere('name', 'organizer')->id]);

            // Add speakers
            $speakerCount = $this->faker->numberBetween(2, 5);
            $speakers = User::factory($speakerCount)->create();
            $conference->users()->attach($speakers->pluck('id'), ['role_id' => $roles->firstWhere('name', 'speaker')->id]);

            // Add attendees
            $attendeeCount = $this->faker->numberBetween(50, 100);
            $attendees = User::factory($attendeeCount)->create();
            $conference->users()->attach($attendees->pluck('id'), ['role_id' => $roles->firstWhere('name', 'attendee')->id]);
        });
    }
}
