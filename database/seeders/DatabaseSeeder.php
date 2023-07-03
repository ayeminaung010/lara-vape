<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\SEOSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\BrandsSeeder;
use Database\Seeders\ReviewSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\FrontendSeeder;
use Database\Seeders\SubCategorySeeder;
use Database\Seeders\ProductColorSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            BrandsSeeder::class,
            ReviewSeeder::class,
            ProductColorSeeder::class,
            FrontendSeeder::class,
            SEOSeeder::class
            // AdminSeeder::class
        ]);
    }
}
