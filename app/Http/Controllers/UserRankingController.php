<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRank;
use Illuminate\Support\Facades\Redis;

class UserRankingController extends Controller
{

    public function updateRank($userId, $rank)
    {
        // Обновление ранга пользователя в Redis
        Redis::zadd('user_ranks', [$userId => $rank]);

        // Обновление ранга пользователя в базе данных
        UserRank::updateOrCreate(['user_id' => $userId], ['rank' => $rank]);

        return response()->json(['message' => 'Ранг успешно обновлен']);
    }

    public function getRanks()
    {
    // Получение рангов пользователей из Redis
    $userRanks = Redis::zrevrange('user_ranks', 0, -1, 'WITHSCORES');

     // Сбор идентификаторов пользователей
     $userIds = array_keys($userRanks);

     // Получение данных о пользователях из базы данных
     $users = User::whereIn('id', $userIds)->get();

    // Форматирование данных
    $formattedRanks = [];
    foreach ($users as $user) {
        $userId = $user->id;
        $rank = $userRanks[$userId] ?? 0; // Устанавливаем ранг 0, если пользователя нет в рейтинге
        $formattedRanks[] = [
            'user_id' => $userId,
            'rank' => (int) $rank,
            'user_name' => $user->name,
        ];
    }

    return response()->json($formattedRanks);
    }
}
