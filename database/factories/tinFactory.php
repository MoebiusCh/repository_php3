<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use Illuminate\Support\Testing\Fakes\Fake;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tin>
 */
class tinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tieuDe' => fake()->name(),
            'noiDung' => Str::random(50),
            'created_at' => Date::now()->format('Y-m-d'),
            'category_id' => rand(1, 2),
        ];
    }
}
