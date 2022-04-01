<?php

namespace App\Models;

use App\Contracts\Models\RewardInterface;
use GuzzleHttp\Exception\GuzzleException;
use http\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Monolog\Handler\IFTTTHandler;

/**
 * App\Models\RewardMonetary
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RewardMonetary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RewardMonetary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RewardMonetary query()
 * @mixin \Eloquent
 */
class RewardMonetary implements RewardInterface
{
    use HasFactory;

    private const MONETARY_REWARD_CAP = 100;
    private RewardType $type;
    private int $value;
    private \GuzzleHttp\Client $client;

    public function __construct($value = 0)
    {
        $this->type = RewardType::where('type', get_class($this))->first();
        $this->setValue($value);
        $this->client = new \GuzzleHttp\Client();
    }

    /**
     * @throws GuzzleException
     */
    public function getReward()
    {
        $this->client->get('');
    }

    public function getRewardValue(): int
    {
        return $this->value;
    }

    public function checkAvailability(): bool
    {
        if ($this->type->quantity >= $this->value) {
            return true;
        }
        return false;
    }

    public function decreaseAvailableReward()
    {
        $this->type->quantity -= $this->value;
        $this->type->save();
    }

    public function setValue($value = 0): RewardMonetary
    {
        if ($value === 0) {
            $this->value = random_int(1, self::MONETARY_REWARD_CAP);
            return $this;
        }
        $this->value = $value;
        return $this;
    }

    public function readableType()
    {
       return 'money';
    }
}

