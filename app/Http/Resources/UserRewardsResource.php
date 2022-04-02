<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Reward;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRewardsResource extends JsonResource
{
    /**
     * Class UserRewardsResource
     *
     * @package App\Http\Resources
     *
     * @mixin Reward
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->mapRewardType(),
            'value' => $this->value,
        ];
    }
}
