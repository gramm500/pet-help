<?php

namespace Database\Seeders;

use App\Models\RewardType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        User::factory()->create([
            'first_name' => 'Jotaro',
            'last_name' => 'Kujo',
            'email' => 'test@example.com',
            'password' =>  Hash::make('secret123'),
            'account_number' => 123123123,
        ]);
        RewardType::factory()->merch()->create();
        RewardType::factory()->monetary()->create();
        RewardType::factory()->loyalty()->create();
    }
}
