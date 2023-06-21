<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Aye',
            'last_name' => "Min Aung",
            'email' => 'ayeminaung.mf@gmail.com',
            'password' => Hash::make('ayeminaung'),
            'gender' => 1,
            'ph_no' => '0983847593',
            'address' => 'Yangon',
            'status' => '1'
        ]);

        User::create([
            'first_name' => 'admin',
            'last_name' => "pro",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'gender' => 1,
            'role' => 'admin',
            'ph_no' => '0983847593',
            'address' => 'Yangon',
            'status' => '1'
        ]);


    }
}
