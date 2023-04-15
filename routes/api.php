<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConversationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1/conversation')->controller(ConversationController::class)->group(function () {
    Route::get('', 'index')->name('conversation.index');
    Route::get('{conversation:channel_id}', 'show')->name('conversation.show');
    Route::get('{conversation:channel_id}/message', 'messageShow')->name('message.show');
    Route::post('{conversation:channel_id}/message', 'messageStore')->name('message.store');
    Route::get('{conversation:channel_id}/participant', 'participantShow')->name('participant.show');

});


Route::post('v1/auth/login', [AuthController::class, 'login']);
