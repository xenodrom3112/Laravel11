<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Category::create([
        //     'nama_kategori' => 'Web Programming',
        //     'slug' => Str::slug('Web Programming')
        // ]);

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => Str::slug('Judul Pertama'),
        //     'author_id' => 1,
        //     'category_id' => 1,
        //     'body' => 'A one-to-many relationship is used to define relationships where a single model is the parent to one or more child models. For example, a blog post may have an infinite number of comments. Like all other Eloquent relationships, one-to-many relationships are defined by defining a method on your Eloquent model:'
        // ]);

        $this->call([
            UserSeeder::class,
            CategorySeeder::class
        ]);
        Post::factory(100)->recycle([
            Category::all(),
            User::all()
            // User::factory(5)->create(),
            // Category::factory(5)->create()
        ])->create();
    }
}
