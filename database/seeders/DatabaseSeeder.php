<?php

namespace Database\Seeders;

use App\Models\RewardType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        RewardType::factory()->merch()->create();
        RewardType::factory()->monetary()->create();
        RewardType::factory()->loyalty()->create();
    }
}
