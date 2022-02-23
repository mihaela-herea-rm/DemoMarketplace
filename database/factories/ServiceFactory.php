<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::factory(),
            'city_id' => City::factory(),
            'user_id' => User::factory(),
            'title' => $this->faker->words(random_int(3, 5), true),
            'slug' => $this->faker->unique()->slug(),
            'excerpt' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
            'price' => random_int(50, 900),
            'active' => $this->faker->boolean(),
            'gender' => random_int(1, 3),
        ];
    }
}
