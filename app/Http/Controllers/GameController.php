<?php

namespace App\Http\Controllers;

use App\Contracts\Models\RewardInterface;
use App\Http\Resources\UserRewardsResource;
use App\Models\Reward;
use Illuminate\Http\Request;

class GameController extends Controller
{


    public function play(Request $request)
    {
        $user = $request->user();
        $reward = (new Reward())->createRandomReward($user);
        $reward->user_id = $user->id;
        $reward->save();



        return view('rewards')->with('rewards', UserRewardsResource::collection($user->rewards()->get()));
    }

    public function getReward(Reward $reward)
    {
        /** @var RewardInterface $helper */
       $helper = new $reward->reward_type($reward->value);
      dd( $helper->getRewardValue());
    }
}
