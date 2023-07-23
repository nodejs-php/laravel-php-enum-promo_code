<?php

namespace Database\Factories;

use App\Models\Coupon;
use App\Models\Promocode;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = rand(20, 100) * 10 - 1;
        $discount = rand(5, 15) * 10 - 1;

        return [
            'total_price' => $price,
            'discount_price' => $discount,
            'final_price' =>  max($price - $discount, 0),
            'promocode_id' => Promocode::factory(),
        ];
    }
}
