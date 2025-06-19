<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TelegramBotController;



Route::post('/telegram/webhook', [TelegramBotController::class, 'handleWebhook']);
Route::get('/telegram/set-webhook', [TelegramBotController::class, 'setWebhook']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
