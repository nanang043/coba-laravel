<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Form>
 */
class FormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'title' => $this->faker->sentence(mt_rand(2,3)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(3,3),
            'deskripsi' => $this->faker->paragraph(mt_rand(5,10)),
            'user_id' => mt_rand(1,5),
            'category_id' => mt_rand(1,3)
        ];
    }
}
