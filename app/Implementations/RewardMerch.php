<?php

declare(strict_types=1);

namespace App\Models;

use App\Contracts\Models\RewardInterface;
use App\Mail\MerchMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mail;

/**
 * App\Models\RewardMerch
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RewardMerch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RewardMerch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RewardMerch query()
 * @mixin \Eloquent
 */
class RewardMerch implements RewardInterface
{
    use HasFactory;

    private RewardType $type;
    private string $value;

    private const AVAILABLE_MERCH = [
        'cup',
        't-shirt',
        'console',
    ];

    public function __construct($value = '')
    {
        $this->type = RewardType::where('type', get_class($this))->first();
        $this->setValue();
    }

    public function getReward(User $user)
    {
        $mail = new MerchMail([
            'name' => $user->first_name . ' ' . $user->last_name,
            'reward' => $this->getRewardValue(),
        ]);
        Mail::to($user->email)->bcc(config('services.mail.support'))->send($mail);
    }


    public function getRewardValue(): string
    {
        return $this->value;
    }

    public function mapRewardToMerch(int $int): string
    {
        if ($int > 7) {
            return self::AVAILABLE_MERCH[2];
        }

        if ($int > 4) {
            return self::AVAILABLE_MERCH[1];
        }

        return self::AVAILABLE_MERCH[0];
    }

    public function checkAvailability(): bool
    {
        $rewardType = RewardType::where('type', get_class($this))->first();
        if ($rewardType->quantity[$this->value] > 0) {
            return true;
        }

        return false;
    }

    public function decreaseAvailableReward()
    {
        $rewardType = RewardType::where('type', get_class($this))->first();
        $arr = $rewardType->quantity;

        $arr[$this->value] = $arr[$this->value] - 1;
        $rewardType->quantity = $arr;
        $rewardType->save();
    }

    public function setValue($value = ''): static
    {
        if ($value === '') {
            $val = random_int(0, 9);
            $this->value = $this->mapRewardToMerch($val);
            return $this;
        }
        $this->value = $value;
        return $this;
    }

    public function readableType()
    {
        return 'merch';
    }
}
