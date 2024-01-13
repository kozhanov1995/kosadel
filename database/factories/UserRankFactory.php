<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserRank;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserRank>
 */
class UserRankFactory extends Factory
{
    protected $model = UserRank::class;

    public function definition()
    {
        return [
            'user_id' => function () {
                return \App\Models\User::inRandomOrder()->first()->id;
            },
            'rank' => $this->faker->numberBetween(1, 10)
        ];
    }
}
