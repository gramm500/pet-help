<?php

namespace App\Models;

use App\Contracts\Models\RewardInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RewardMonetary
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RewardMonetary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RewardMonetary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RewardMonetary query()
 * @mixin \Eloquent
 */
class RewardMonetary extends Model implements RewardInterface
{
    use HasFactory;

    public function getReward()
    {

    }
}
