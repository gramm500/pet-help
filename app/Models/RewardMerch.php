<?php

declare(strict_types=1);

namespace App\Models;

use App\Contracts\Models\RewardInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RewardMerch
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RewardMerch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RewardMerch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RewardMerch query()
 * @mixin \Eloquent
 */
class RewardMerch extends Model implements RewardInterface
{
    use HasFactory;

    public function getReward()
    {
        dd('shmot');
    }
}
