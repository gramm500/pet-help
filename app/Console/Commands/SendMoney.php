<?php

namespace App\Console\Commands;

use App\Models\Reward;
use App\Models\RewardMonetary;
use Illuminate\Console\Command;

class SendMoney extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:money {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send all non cashed money';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $count = $this->argument('count') ?? 100;
        Reward::where('type', RewardMonetary::class)->chunk($count, function ($rewards){
            foreach ($rewards as $reward) {
                $helper = new $reward->reward_type($reward->value);
                $helper->getReward($reward->user);
            }
        });
    }
}
