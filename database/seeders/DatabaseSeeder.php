<?php

namespace Database\Seeders;

use App\Models\Category;
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

        // Create categories using the factory
        Category::factory()->count(5)->create();

        // Add other seeders as needed

        $this->call([
            ProductSeeder::class,
        ]);
    }
}
