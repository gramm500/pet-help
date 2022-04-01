<?php

declare(strict_types=1);

namespace App\Models;

use App\Contracts\Models\RewardInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RewardLoyalty
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RewardLoyalty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RewardLoyalty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RewardLoyalty query()
 * @mixin \Eloquent
 */
class RewardLoyalty implements RewardInterface
{
    use HasFactory;

    private int $value = 0;

    private const MAX_POINTS = 1000;

    public function __construct()
    {
        $this->getRewardValue();
    }

    public function getReward()
    {

    }

    public function getRewardValue(): int
    {
        $this->value = random_int(0, self::MAX_POINTS);
        return $this->value;
    }

    public function checkAvailability(): bool
    {
        return true;
    }

    public function decreaseAvailableReward()
    {
        return;
    }

    public function readableType(): string
    {
        return 'your points';
    }
}
