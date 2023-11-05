<?php

namespace Database\Factories;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SubscriptionFactory extends Factory
{
    protected $model = Subscription::class;

    public function definition()
    {
        $user = User::inRandomOrder()->first() ?? User::factory()->create();
        $website = Website::inRandomOrder()->first() ?? Website::factory()->create();

        return [
            'user_id' => $user->id,
            'website_id' => $website->id,
            'expired_at' => $this->faker->dateTimeBetween('now', '+1 year'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
