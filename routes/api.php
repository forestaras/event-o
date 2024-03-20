<?php

use App\Http\Controllers\New_TelegramBotController;
use App\Http\Controllers\TelegramController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/telegram/handle', [New_TelegramBotController::class, 'handle']);
Route::get('/telegram/rez/{cid}', [New_TelegramBotController::class, 'rezult']);
Route::get('/telegram', [New_TelegramBotController::class, 'curl'])->name('curl');


// Route::get('/admin/telegram/{event_id}/{pass}/{time}/{stat}', [TelegramController::class, 'search2'])->name('telegram_search');
// Route::get('/admin/telegramm', [TelegramController::class, 'telegram'])->name('telegram');
// //Телеграм
// Route::post('/telegram/webhook', [New_TelegramBotController::class, 'telegram']);
// Route::get('/telegram/set-webhook', [New_TelegramBotController::class, 'setWebhook']);
