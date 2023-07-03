<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SEOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'title' => 'Ecommerce',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi repellendus nam iste accusamus eos ab ad placeat non. Recusandae autem reiciendis earum cupiditate beatae saepe nemo quaerat possimus incidunt non!
            ',
            'keywords' => 'Ecommerce',
            'author' => 'Ecommerce',
            'social_title' => 'Ecommerce',
            'social_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi repellendus nam iste accusamus eos ab ad placeat non. Recusandae autem reiciendis earum cupiditate beatae saepe nemo quaerat possimus incidunt non!
            ',
        ];

        \App\Models\SEO::create($data);
    }
}

