<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
