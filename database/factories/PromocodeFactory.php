<?php

namespace Database\Factories;

use App\Enums\PromocodeTypes;
use App\ValueObject\PromocodeCondition;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promocode>
 */
class PromocodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->word(),
            'discount' => rand(1, 10) * 10 - 1,
            'type' => collect(PromocodeTypes::cases())->random(),
            'expires_at' => now()->addDays(7),
            'active' => true,
            'condition' => PromocodeCondition::fromArray([
                'type' => 'price',
                'value' => 22,
            ]),
        ];
    }
}
