<?php

declare(strict_types=1);

namespace App\Contracts\Models;

interface RewardInterface
{
    public function getReward();

    public function getRewardValue();

    public function checkAvailability(): bool;

    public function decreaseAvailableReward();

    public function readableType();
}