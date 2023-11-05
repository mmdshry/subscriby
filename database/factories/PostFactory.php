<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        $website = Website::inRandomOrder()->first() ?? Website::factory()->create();

        return [
            'title' => $this->faker->jobTitle(),
            'content' => $this->faker->sentence(),
            'website_id' => $website->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
