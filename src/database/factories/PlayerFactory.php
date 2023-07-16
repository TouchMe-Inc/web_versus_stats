<?php

namespace Database\Factories;

use App\Enums\VersusStats;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $stats = [];
        for ($code = 0; $code < VersusStats::CODE_STATS_SIZE->value; $code++) {
            $stats["code_{$code}"] = $this->faker->numberBetween(0, 1000);
        }

        return array_merge([
            'last_name' => $this->faker->name(),
            'steam_id' => bcadd($this->faker->numberBetween(1000, 100000) * 2 + 1, 76561197960265728),
            'played_time' => $this->faker->numberBetween(3600 * 24, 3600 * 24 * 365),
            'last_visit' => $this->faker->unixTime() + $this->faker->randomDigit(),
            'rating' => $this->faker->randomFloat(1, 5, 70),
        ], $stats);
    }
}
