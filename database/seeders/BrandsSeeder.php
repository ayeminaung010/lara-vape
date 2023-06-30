<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
        'Efan',
        'Cotton',
        'Alien',
        'Marvos',
        'Maxus',
        'RDA',
        'Aubte',
        'EKS',
        'Frio',
        'Glee',
        'Infy',
        'Relax Infinity',
        'Valaddin X',
        'Yooz',
        'Yuoto',
        'Aladdin Pro',
        'EIR',
        'Glax',
        'Max',
        'Onnix',
        'Frees Cartridge',
        'Miso Pro',
        'Oxva Xlim',
        'Simmi',
        'Sx mini Cartridge',
        'Vapefly Manner 2 Coil',
        'Wanderlust Cartridge',
        'Wenax',
        'Magic Bar',
        'RandM',
        'AISO',
        'Cozy',
        'Walkie',
        'Alchemaster',
        'Crazy Vape',
        'Druga',
        'Penguin Land',
        'Hybrid',
        'The Hound',
        'Coastal Cloud',
        'Air Factory',
        'Barista',
        'Beard',
        'Brella',
        'Chef Brew Saltnic',
        'Coastal Clouds Saltnic',
        'Horny Saltnic',
        'Hybrid Saltnic',
        'Johnny Cream Puff',
        'Met 4',
        'Naked 100',
        'VGod Saltnic',
        'Yami',
        'Barista',
        'Brella',
        'Vgod',
        'Fcukin Flava',
        'Horny',
        'Geekvape',
        'Hellvape',
        'Oxva',
        'ZQ Xtal'
        ];
        foreach ($brands as $brand) {
            \App\Models\Brands::create([
                'name' => $brand
            ]);
        }
    }
}
