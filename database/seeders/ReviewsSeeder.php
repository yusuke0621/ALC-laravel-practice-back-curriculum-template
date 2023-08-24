<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Review;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::factory()->count(50)->create();
    }
}
