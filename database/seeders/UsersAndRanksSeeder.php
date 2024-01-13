<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserRank;

class UsersAndRanksSeeder extends Seeder
{
    public function run()
    {
        // Создание тестовых пользователей
        $users = factory(\App\Models\User::class, 10)->create();

        // Создание тестовых рангов
        $users->each(function ($user) {
            factory(\App\Models\UserRank::class)->create(['user_id' => $user->id]);
        });
    }
}
