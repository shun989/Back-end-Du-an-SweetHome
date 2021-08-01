<?php

namespace Database\Factories;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Apartment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(100,9999),
            'description' => $this->faker->numerify('description ###'),
            'bathroomNumber' => $this->faker->randomDigitNot(5),
            'bedroomNumber' => $this->faker->randomDigitNot(5),
            'photo' => $this->faker->url,
            'address' => $this->faker->address,
            'user_id' => $this->faker->numberBetween(1,50),
            'category_id' => $this->faker->numberBetween(1,5),
            'status_id' => $this->faker->numberBetween(1,3),
            'ward_id' => $this->faker->numberBetween(1,1000),
        ];
    }
}
