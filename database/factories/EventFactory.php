<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'eventDate' => $this->faker->dateTimeThisYear(),
            'phoneNumber' => $this->faker->phoneNumber(),
            'eventTitle' => $this->faker->sentence(),
            'request' => $this->faker->paragraph(),
        ];
    }
}
