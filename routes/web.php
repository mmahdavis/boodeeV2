<?php

use App\Models\Participant;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'conversations' => Participant::with('Conversation')->where('user_id', Auth()->User()->id)->get()
    ]);
})->middleware('auth');

Route::get('/conversation', function () {
    return Inertia::render('Welcome', [
        'conversations' => Participant::with('Conversation')->where('user_id', Auth()->User()->id)->get()
    ]);
})->middleware('auth')->name('conversation');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

