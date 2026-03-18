<?php

namespace Database\Factories;

use App\Models\cashflowType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<cashflow_type>
 */
class CashflowTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(2, true);
        return [
            'uuid' => Str::orderedUuid(),
            'code' => $name,
            'name' => Str::snake($name),
            'description' => $this->faker->words(5, true),
        ];
    }
}
