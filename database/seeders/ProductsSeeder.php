<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products  = [
            [
                'name' => 'Vape 1',
                'description' => 'test project',
                'brand_id' => 9,
                'sub_category_id' => 19,
                'original_price' => '50000',
                'stock' => 5,
                'image' => '64a2ec6fc71c8.istockphoto.jpg',
                'color' => '["Red","Pink","Grey","Brown"]'
            ],
            [
                'name' => 'Vape product 2',
                'description' => 'tes decefdfdsffffffff',
                'brand_id' => 4,
                'sub_category_id' => 5,
                'original_price' => '30000',
                'stock' => 3,
                'image' => '64a2ecd3ee769.LVE Orion ll Replacement Coils.png',
                'color' => '["Purple","Pink"]'
            ],
        ];
        foreach ($products as $product) {
            Products::create([
                'name' => $product['name'],
                'description' => $product['description'],
                'brand_id' => $product['brand_id'],
                'sub_category_id' => $product['sub_category_id'],
                'original_price' => $product['original_price'],
                'stock' => $product['stock'],
                'image' => $product['image'],
                'color' => $product['color']
            ]);
        }
    }
}
