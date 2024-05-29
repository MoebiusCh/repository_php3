<?php

namespace Database\Factories;

use App\Models\tin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tinTucCategory>
 */
class tinTucCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => Str::random(5),
        ];
    }
    public function tin()
    {
        return $this->hasMany(tin::class);
    }
}
