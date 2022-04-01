<?php

namespace App\Models;

use App\Contracts\Models\RewardInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Reward
 *
 * @property int $id
 * @property string $reward_type
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|Reward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reward query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reward whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reward whereRewardType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reward whereValue($value)
 * @mixin \Eloquent
 */
class Reward extends Model
{
    use HasFactory;

    private RewardInterface $reward;

    protected $fillable = [
        'reward_type',
        'value',
    ];

    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (array_key_exists('reward_type', $attributes)) {
            $helper = new $attributes['reward_type'];
            $this->setRewardHelper($helper);
        }
    }

    public function user(): HasOne
    {
      return $this->hasOne('user');
    }

    public function createRandomReward(User $user): Reward
    {
        $rewardClass = RewardType::REWARDS_TYPES[random_int(0, count(RewardType::REWARDS_TYPES) - 1)];

        /** @var RewardInterface $class */
        $class = new $rewardClass;
        $class->checkAvailability();
        $this->setRewardHelper($class);
        $this->reward_type = $rewardClass;
        if ($this->reward->checkAvailability() === false) {
            $this->reward = new RewardLoyalty();
        }
        $this->value = $this->reward->getRewardValue();
        $this->reward->decreaseAvailableReward();

        return $this;
    }

    public function setRewardHelper(RewardInterface $reward): Reward
    {
        $this->reward = $reward;
        return $this;
    }

    public function getReward()
    {
        return $this->reward->getReward();
    }

    public function mapRewardType()
    {
        return RewardType::REWARDS_MAPPING[$this->reward_type];
    }
}
