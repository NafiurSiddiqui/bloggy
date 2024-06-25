<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //        User::factory()->create([
        //            'name' => 'Test User',
        //            'email' => 'test@example.com',
        //        ]);
        //

        //        User::factory(3)->create();
        Category::factory()->create([
            'id' => 1,
            'title' => 'uncategorized',
            'slug' => 'uncategorized'
        ]);


        Post::factory(20)->create();
    }
}
