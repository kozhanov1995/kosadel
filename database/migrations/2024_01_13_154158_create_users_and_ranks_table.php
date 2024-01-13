<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\UserRank;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Тестовые данные
        $this->seedTestData();
    }

    private function seedTestData()
    {
        // Создание тестовых пользователей
        $users = User::factory()->count(10)->create();

        // Создание тестовых рангов
        $users->each(function ($user) {
            UserRank::factory()->create(['user_id' => $user->id]);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_ranks');
        Schema::dropIfExists('users');
    }
};
