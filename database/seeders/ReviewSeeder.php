<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            [
                'title' => 'The best service for all',
                'message' => 'The best service for all your vaping needs and really fast delivery.',
                'rating_star' => '5',
                'reviewer_name' => 'Stacey T.',
            ],
            [
                'title' => 'Review',
                'message' => "The service is great the products always despatched on the day of ordering & doesn't take long to arrive",
                'rating_star' => '5',
                'reviewer_name' => 'Glenda W.',
            ],
            [
                'title' => 'BEST flavour',
                'message' => 'Tried just about all of them and only ever order this one because it’s my all time fav',
                'rating_star' => '5',
                'reviewer_name' => 'Kamryn M.',
            ],
            [
                'title' => 'The staff are always friendly',
                'message' => 'The staff are always friendly whether it be by phone or email',
                'rating_star' => '5',
                'reviewer_name' => 'Glenda W.',
            ],
            [
                'title' => 'Cough gone',
                'message' => 'Love the variety , smell without the stink , customer service is great and price. 43 yr of smoking , 2 &half years on vape. Lo...',
                'rating_star' => '5',
                'reviewer_name' => 'Tim S.',
            ],
        ];

        foreach ($reviews as $review) {
            \App\Models\Review::create($review);
        }
    }
}
