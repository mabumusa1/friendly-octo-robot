<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Install;
use App\Models\DataCenter;
use Auth;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $dataCenter = DataCenter::first();

        $unverified = User::factory()->unverified()->create([
            'email' => 'unverified@example.com'
        ]);

        $firstTimeUser = User::factory()->create([
            'email' => 'firstTime@example.com'
        ]);

        $onboardedUser = User::factory()->create([
            'email' => 'test@example.com'
        ]);

        Install::withoutEvents(function() use ($onboardedUser, $dataCenter){
            Install::factory()->lab()->create([
                'user_id' => $onboardedUser->id,
                'data_center_id' => $dataCenter->id,
            ]);

            Install::factory()->demo()->create([
                'user_id' => $onboardedUser->id,
                'data_center_id' => $dataCenter->id
            ]);

            Install::factory()->dev()->create([
                'user_id' => $onboardedUser->id,
                'data_center_id' => $dataCenter->id
            ]);
            Install::factory()->prod()->create([
                'user_id' => $onboardedUser->id,
                'data_center_id' => $dataCenter->id
            ]);
        });

        $this->call([
            PlanSeeder::class,
        ]);
    }
}
