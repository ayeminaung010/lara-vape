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
            [
                'name' => 'Cotton bacon',
                'description' => 'test Cotton bacon',
                'brand_id' => 2,
                'sub_category_id' => 3,
                'original_price' => '20000',
                'stock' => 5,
                'image' => '64acd6a12a155.Cotton bacon.jpg',
                'color' => 'null'
            ],
            [
                'name' => 'Vape Bag',
                'description' => 'Apologies for the confusion. If you would like me to fix your existing code, please provide the original code snippet that needs to be corrected, and let me know what changes you would like to make.',
                'brand_id' => 5,
                'sub_category_id' => 5,
                'original_price' => '13000',
                'stock' => 6,
                'image' => '64acd6fd662b1.Vape Bag.png',
                'color' => '["Black"]'
            ],
            [
                'name' => 'Efan 2 slot Charger',
                'description' => 'battery charger',
                'brand_id' => 1,
                'sub_category_id' => 2,
                'original_price' => '20000',
                'stock' => 6,
                'image' => '64acd65fedb25.EFan 2slots Charger.jpg',
                'color' => '["Black"]'
            ],
            [
                'name' => 'Efan Battery',
                'description' => 'test battery',
                'brand_id' => 1,
                'sub_category_id' => 1,
                'original_price' => '10000',
                'stock' => 6,
                'image' => '64acd633c34fc.3100 Mah.jpg',
                'color' => '["Black"]'
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
