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

Route::get('/update-rank/{userId}/{rank}', [UserRankingController::class, 'updateRank']);
Route::get('/get-ranks', [UserRankingController::class, 'getRanks']);

Route::get('/send-notification/{userId}', [PushNotificationController::class, 'sendNotification']);
