<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\Models\RewardInterface;
use App\Http\Services\GameService;
use App\Models\Reward;
use App\Models\RewardMonetary;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class GameController extends Controller
{

    private GameService $service;

    public function __construct()
    {
        $this->service = new GameService();
    }

    public function play(Request $request)
    {
        $user = $request->user();
        $this->service->createRandomReward($user);
        $rewards = $this->service->mapResultsForView($user);

        return view('rewards')->with('rewards', $rewards);
    }

    public function getReward(Reward $reward, Request $request)
    {
        /** @var RewardInterface $helper */
        if ($reward->user_id !== $request->user()->id) {
            throw new AccessDeniedHttpException();
        }

        $helper = new $reward->reward_type($reward->value);
        $helper->getReward($reward->user);
        $reward->delete();

        $rewards = $this->service->mapResultsForView($request->user());

        return view('rewards')->with('rewards', $rewards);
    }

    public function getRewards(Request $request)
    {
        $rewards = $this->service->mapResultsForView($request->user());

        return view('rewards')->with('rewards', $rewards);
    }

    public function refuseReward(Reward $reward,Request $request)
    {
        if ($reward->user_id !== $request->user()->id) {
            throw new AccessDeniedHttpException();
        }

        /** @var RewardInterface $helper */
        $helper = new $reward->reward_type($reward->value);
        if (get_class($helper) === RewardMonetary::class){
            $request->user()->points += $helper->convertToPoints();
        }
        $reward->delete();

        $rewards = $this->service->mapResultsForView($request->user());

        return redirect('/rewards')->with('rewards', $rewards);
    }
}
