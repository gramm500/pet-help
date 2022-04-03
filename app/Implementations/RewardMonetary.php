<?php

declare(strict_types=1);

namespace App\Models;

use App\Contracts\Models\RewardInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    private const POINTS_WORTH = 0.01;
    private RewardType $type;
    private int $value;
    private Client $client;

    public function __construct($value = '')
    {
        $this->type = RewardType::where('type', get_class($this))->first();
        $this->setValue($value);
        $this->client = new Client();
    }

    /**
     * @throws GuzzleException
     */
    public function getReward(User $user)
    {
       try{
           //Mock request to bank api or a webhook
         $result =  $this->client->get(config('services.http.url'), [
             'user_account' => $user->account_number,
         ]);
       } catch (\Exception $exception) {
           \Log::emergency(" Exception :{$exception->getMessage()} \n User: {$user->id}");
       }
       // for now just increase user balance
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

    public function setValue($value = ''): RewardMonetary
    {
        if ($value === '') {
            $this->value = random_int(1, self::MONETARY_REWARD_CAP);
            return $this;
        }
        $this->value = (int)$value;
        return $this;
    }

    public function readableType()
    {
       return 'money';
    }

    public function convertToPoints(): float|int
    {
        return $this->value * self::POINTS_WORTH;
    }
}

