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
            [
            'name' => 'Accessories',
            'slug' => 'accessories',
            ],
            [
                'name' => 'Coil And Catridge',
                'slug' => 'coil-and-catridge',
            ],
            [
                'name' => 'Disposable',
                'slug' => 'disposable',
            ],
            [
                'name' => 'E-Liquids',
            'slug' => 'e-liquids',
            ],
            [
                'name' => 'Pod Device',
                'slug' => 'pod-device',
            ],
            [
                'name' => 'Vape Device',
                'slug' => 'vape-device'
            ]
        ];
        foreach ($categories as  $category) {
            Category::create([
                'name' => $category['name'],
                'slug'  => $category['slug']
            ]);
        }
    }
}
