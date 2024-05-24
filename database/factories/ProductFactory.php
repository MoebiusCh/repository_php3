<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

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

    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'image' => $this->faker->imageUrl,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'sale' => $this->faker->boolean,
            'description' => $this->faker->text,
            'detail' => $this->faker->text,
            'status' => $this->faker->word,
            'category_id' => Category::factory(),
        ];
    }
}
