<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Accessories',
            'Coil And Catridge',
            'Disposable',
            'E-Liquids',
            'Pod Device',
            'Vape Device'
        ];
        foreach ($categories as  $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
