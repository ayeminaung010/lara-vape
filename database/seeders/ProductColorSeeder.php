<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            'Red',
            'Blue',
            'Green',
            'Yellow',
            'Black',
            'White',
            'Orange',
            'Purple',
            'Pink',
            'Grey',
            'Brown',
            'Gold',
            'Silver',
            'Bronze',
            'Copper',
        ];
        foreach ($colors as $color) {
            \App\Models\ProductColor::create([
                'name' => $color,
            ]);
        }
    }
}
