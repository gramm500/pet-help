<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\RewardLoyalty;
use App\Models\RewardMerch;
use App\Models\RewardMonetary;
use App\Models\RewardType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class RewardTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = RewardType::class;

    public function definition(): array
    {
        return [
            'type' => $this->faker->name,
        ];
    }

    public function monetary() : RewardTypeFactory
    {
        return $this->state(function () {
            return [
                'type' => RewardMonetary::class,
            ];
        });
    }

    public function loyalty() : RewardTypeFactory
    {
        return $this->state(function () {
            return [
                'type' => RewardLoyalty::class,
            ];
        });
    }

    public function merch() : RewardTypeFactory
    {
        return $this->state(function () {
            return [
                'type' => RewardMerch::class,
            ];
        });
    }
}
