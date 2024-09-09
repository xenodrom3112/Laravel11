<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'nama_kategori' => 'Web Programming',
            'slug' => Str::slug('Web Programming'),
            'color' => 'green'
        ]);
        Category::create([
            'nama_kategori' => 'Web Design',
            'slug' => Str::slug('Web Design'),
            'color' => 'blue'
        ]);
        Category::create([
            'nama_kategori' => 'UI/UX',
            'slug' => Str::slug('UI/UX'),
            'color' => 'yellow'
        ]);
        Category::create([
            'nama_kategori' => 'Web Framework',
            'slug' => Str::slug('Web Framework'),
            'color' => 'red'
        ]);
        Category::create([
            'nama_kategori' => 'Web CMS',
            'slug' => Str::slug('Web CMS'),
            'color' => 'purple'
        ]);
    }
}
