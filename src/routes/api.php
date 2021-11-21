<?php

use App\Http\Controllers\Auth0Controller;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LeaderboardController;
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

Route::prefix('auth0-endpoints')->name('auth0-endpoints.')->group(function () {
    Route::get('callback', [Auth0Controller::class, 'callback'])->name('callback');
    Route::get('login', [Auth0Controller::class, 'login'])->name('login');
    Route::get('logout', [Auth0Controller::class, 'logout'])->name('logout');
});

Route::prefix('events')->name('events')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('.index');
    Route::get('/mine', [EventController::class, 'mine'])->name('.mine')->middleware('auth0');
    Route::get('/{id}', [EventController::class, 'show'])->name('.show');
    Route::post('/', [EventController::class, 'store'])->name('.store');
    Route::post('/participate', [EventController::class, 'createParticipation'])->name('.createParticipation')->middleware('auth0');
    Route::put('/participate', [EventController::class, 'editParticipation'])->name('.editParticipation')->middleware('auth0');
    Route::post('/quit-participate', [EventController::class, 'quitParticipation'])->name('.quitParticipation')->middleware('auth0');
    Route::put('/', [EventController::class, '.update']);
    Route::delete('/{id}', [EventController::class, '.destroy']);
});

Route::prefix('leaderboard')->name('leaderboard')->group(function () {
    Route::get('/', [LeaderboardController::class, 'index'])->name('.index');
});