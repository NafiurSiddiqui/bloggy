<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = Category::factory()->create();
        $subcategory = Subcategory::factory()->create(['category_id' => $category->id]);
        return [
            'user_id' => \App\Models\User::factory([
                'role' => 'editor'
            ]),
            'category_id' => $category->id,
            'subcategory_id' => $subcategory->id,
            'title' => $this->faker->sentence,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->text,
            'body' => $this->faker->paragraph,
            'thumbnail' => $this->faker->imageUrl(),
            'thumbnail_alt_txt' => $this->faker->text,
            'is_published' => $this->faker->boolean,
            'is_draft' => $this->faker->boolean,
            'is_unpublished' => $this->faker->boolean,
            'is_featured' => $this->faker->randomElement(['on', 'off']),
            'is_hot' => $this->faker->randomElement(['on', 'off']),
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->text,
            'og_thumbnail' => $this->faker->imageUrl(),
            'og_title' => $this->faker->sentence,
        ];
    }
}
