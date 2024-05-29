<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Testing\Fakes\Fake;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;
    protected static $imageCounter = 1;
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'image' => 'img/product/product-' . self::$imageCounter++ . '.jpg',
            'price' => $this->faker->randomFloat(2, 10, 100),
            'sale' => fake()->numberBetween(0, 1),
            'description' => $this->faker->text,
            'detail' => $this->faker->text,
            'status' => fake()->numberBetween(0, 1),
            'sale_rate' => fake()->numberBetween(0, 100),
            'is_hot' => fake()->numberBetween(0, 1),
            'category_id' => Category::factory(),
        ];
    }
}
