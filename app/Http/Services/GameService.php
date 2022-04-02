<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Models\Reward;
use App\Models\User;

class GameService
{
    public function mapResultsForView(User $user): array
    {
        return $user->rewards->map(static function ($item) {
            return [
                'id' => $item->id,
                'reward_type' => $item->mapRewardType(),
                'value' => $item->value,
            ];
        })->toArray();
    }

    public function createRandomReward(User $user): Reward
    {
        $reward = (new Reward())->createRandomReward();
        $reward->user_id = $user->id;
        $reward->save();
        return $reward;
    }
}