<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRankingController;
use App\Http\Controllers\PushNotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//создание/обновление ранга
Route::get('/update-rank/{userId}/{rank}', [UserRankingController::class, 'updateRank']);

//просмотр ранга
Route::get('/get-ranks', [UserRankingController::class, 'getRanks']);

//отправка уведомления пользователю по id
Route::get('/send-notification/{userId}', [PushNotificationController::class, 'sendNotification']);
