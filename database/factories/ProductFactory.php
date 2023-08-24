<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Category;
use App\Models\Store;
use App\Models\TaxRate;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'store_id' => Store::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'tax_rate_id' => TaxRate::inRandomOrder()->first()->id,
            'name' => $this->faker->unique()->lexify('商品-????'),
            'description' => $this->faker->realText(200),
            'price' => $this->faker->randomNumber(rand(3, 5), true), // 3 ~ 5桁の数値をランダム生成
        ];
    }
}
