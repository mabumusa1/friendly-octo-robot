<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [];

        if (App::environment('production')) {
            //TODO: Add Production plans
        } else {
            $plans = [
                [
                    'contacts' => 2500,
                    'slug' => '2500-monthly',
                    'stripe_plan' => 'price_1LmDwTQtw9T5bCK19IZz3F3M',
                    'price' => 50,
                    'period' => 'monthly',
                ],
                [
                    'contacts' => 2500,
                    'slug' => '2500-yearly',
                    'stripe_plan' => 'price_1LmDwTQtw9T5bCK17rTR7gjr',
                    'price' => 500,
                    'period' => 'yearly',

                ],
                [
                    'contacts' => 5000,
                    'slug' => '5000-monthly',
                    'stripe_plan' => 'price_1LmE0IQtw9T5bCK1zZHjxT9Y',
                    'price' => 90,
                    'period' => 'monthly',
                ],
                [
                    'contacts' => 5000,
                    'slug' => '5000-monthly',
                    'stripe_plan' => 'price_1LmE0IQtw9T5bCK1vLuWjLgn',
                    'price' => 900,
                    'period' => 'yearly',
                ],
                [
                    'contacts' => 10000,
                    'slug' => '10000-monthly',
                    'stripe_plan' => 'price_1LmE0zQtw9T5bCK1NRBCLlIa',
                    'price' => 160,
                    'period' => 'monthly',
                ],
                [
                    'contacts' => 10000,
                    'slug' => '10000-yearly',
                    'stripe_plan' => 'price_1LmE10Qtw9T5bCK1stIK9tBl',
                    'price' => 16000,
                    'period' => 'yearly',
                ],
                [
                    'contacts' => 25000,
                    'slug' => '25000-monthly',
                    'stripe_plan' => 'price_1LmE28Qtw9T5bCK1pcKrSStI',
                    'price' => 420,
                    'period' => 'monthly',
                ],
                [
                    'contacts' => 25000,
                    'slug' => '25000-yearly',
                    'stripe_plan' => 'price_1LmE28Qtw9T5bCK1EPwRLTDr',
                    'price' => 4200,
                    'period' => 'yearly',
                ],
            ];

            foreach ($plans as $plan) {
                \App\Models\Plan::create($plan);
            }
        }
    }
}
