<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'     => User::factory(),
            'category_id' => Category::factory(),
            'title'       => $title = $this->faker->sentence,
            'slug'        => str::slug($title),
            'excerpt'     => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            'body'        => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
        ];
    }
}
