<?php

declare(strict_types=1);

namespace App\Contracts\Models;

use App\Models\User;

interface RewardInterface
{
    public function getReward(User $user);

    public function getRewardValue();

    public function checkAvailability(): bool;

    public function decreaseAvailableReward();
}