<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FrontendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        'logo' => '64ac26f2165c3.Vape-Vibe-PNG-1-100x100.png',
        'facebook_url' => 'https://www.facebook.com/',
        'instagram_url' => 'https://www.instagram.com/',
        ];
        \App\Models\Frontend::create($data);
    }
}
