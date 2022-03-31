<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RewardType
 *
 * @property int $id
 * @property string $type
 * @method static \Database\Factories\RewardTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|RewardType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RewardType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RewardType query()
 * @method static \Illuminate\Database\Eloquent\Builder|RewardType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RewardType whereType($value)
 * @mixin \Eloquent
 */
class RewardType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public const REWARDS_TYPES = [
        RewardMonetary::class,
        RewardMerch::class,
        RewardLoyalty::class,
    ];

    protected $fillable = [
        'type'
    ];
}
