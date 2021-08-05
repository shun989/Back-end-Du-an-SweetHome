<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'check_in' => $this->faker->dateTime,
            'check_out' => $this->faker->dateTime,
            'total_price' => $this->faker->numberBetween(100000,999999),
            'user_id' => $this->faker->numberBetween(1,9),
            'apartment_id' => $this->faker->numberBetween(1,20),
        ];
    }
}
