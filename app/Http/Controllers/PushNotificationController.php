<?php

namespace App\Http\Controllers;

use App\Jobs\SendNotification;
use Illuminate\Http\Request;
use App\Notifications\PushNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\Models\User;

class PushNotificationController extends Controller
{
    public function sendNotification($userId)
    {
        $user = User::where('id', $userId)->first();

        if ($user) {
            Log::info('Dispatching job...');
            SendNotification::dispatch($user)->onQueue('notifications');
            Log::info('Job dispatched.');
            return "Уведомление отправлено асинхронно пользователю: " . $user['name'];
        } else {
            return "Пользователь с ID $userId не найден.";
        }
    }
}
