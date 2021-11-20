<?php

use App\Http\Controllers\EventController;
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

// TODO: use prefix
Route::get('/events', [EventController::class, 'index'])->name('events-index');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events-show');
Route::post('/events', [EventController::class, 'store'])->name('events-store');
Route::post('/events/participate', [EventController::class, 'createParticipation'])->name('events-createParticipation')->middleware('auth0');
Route::post('/events/quit-participate', [EventController::class, 'quitParticipation'])->name('events-quitParticipation')->middleware('auth0');
Route::put('/events', [EventController::class, 'events-update']);
Route::delete('/events/{id}', [EventController::class, 'events-destroy']);