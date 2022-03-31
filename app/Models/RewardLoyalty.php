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
class RewardLoyalty extends Model implements RewardInterface
{
    use HasFactory;

    public function getReward()
    {
       dd('loyalty');
    }
}
