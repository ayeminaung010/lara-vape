<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu = [
            'Freemax',
            'Cozy 6000Puff',
            'AISO 2600 Puff',
            'Refillable Coil And Cartridge',
            'Prefillable Cartridges'
        ];
        foreach($menu as $item) {
            Menu::create($item);
        }
    }
}
