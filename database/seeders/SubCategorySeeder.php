<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategories = [
            [
                'category_id' => 1,
                'name' => 'Battery'
            ],
            [
                'category_id' => 1,
            'name' => 'Battery Charger'
            ],
            [
                'category_id' => 1,
                'name' => 'Cotton'
            ],
            [
                'category_id' => 1,
                'name' => 'Lanyard'
            ],
            [
                'category_id' => 1,
                'name' => 'Vape Bag'
            ],
            [
                'category_id' => 1,
                'name' => 'Vape Coil and Tank'
            ],
            [
            'category_id' => 2,
                'name' => 'Prefillable Cartridges'
            ],
            [
                'category_id' => 2,
                'name' => 'Refillable Coil And Cartridge'
            ],
            [
                'category_id' => 3,
                'name' => 'AISO 2600 Puff'
            ],
            [
                'category_id' => 3,
                'name' => 'Cozy 6000Puff'
            ],
            [
                'category_id' => 3,
                'name' => 'Freemax'
            ],
            [
                'category_id' => 3,
                'name' => 'Magic Bar 7000 Puff'
            ],
            [
                'category_id' => 3,
                'name' => 'RandM 7000 Puff'
            ],
            [
                'category_id' => 3,
                'name' => 'Walkie 6000 Puff'
            ],
            [
                'category_id' => 3,
                'name' => 'Yuoto 3000 Puff'
            ],
            [
                'category_id' => 4,
                'name' => '5ML Saltnic'
            ],
            [
                'category_id' => 4,
                'name' => '10ML Saltnic'
            ],
            [
                'category_id' => 4,
                'name' => '15 ML Saltnic'
            ],
            [
                'category_id' => 4,
                'name' => '30ML Saltnic'
            ],
            [
                'category_id' => 4,
                'name' => '50MG'
            ],
            [
                'category_id' => 4,
                'name' => 'Freebase 60ML'
            ],
            [
                'category_id' => 4,
                'name' => 'Freebase 100ML'
            ],
            [
                'category_id' => 4,
                'name' => 'Freebase 120ML'
            ],
            [
                'category_id' => 5,
                'name' => 'Prefillable Pod'
            ],
            [
                'category_id' => 5,
                'name' => 'Refillable Pod'
            ],
            [
                'category_id' => 5,
                'name' => 'Freemax'
            ]
        ];

        foreach ($subCategories as $subCategory) {
            \App\Models\SubCategory::create($subCategory);
        }
    }
}
