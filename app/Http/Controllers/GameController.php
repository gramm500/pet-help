<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use App\Models\UserReward;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function play(Request $request)
    {
        $user = $request->user();

        $rew =  (new Reward())->createRandomReward($user);

        $rew->save();

        UserReward::create(['user_id' => $user->id, 'reward_id' => $rew->id]);
    }
}
