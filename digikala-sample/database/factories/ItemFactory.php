<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class ItemFactory.
 *
 * @package Database\Factories
 */
class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique->word,
            'price' => $this->faker->randomNumber(5),
            'number' => rand(10, 50),
            'properties' => $this->faker->text(30)
        ];
    }
}
