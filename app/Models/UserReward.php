<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\UserReward
 *
 * @property int $user_id
 * @property int $reward_id
 * @property-read \App\Models\Reward|null $reward
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserReward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserReward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserReward query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserReward whereRewardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReward whereUserId($value)
 * @mixin \Eloquent
 */
class UserReward extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'reward_id',
    ];

    protected $table = 'user_reward';

    public function reward(): HasOne
    {
        return $this->hasOne(Reward::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

}
