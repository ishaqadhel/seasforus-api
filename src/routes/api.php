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
Route::put('/events', [ProductController::class, 'events-update']);
Route::delete('/events/{id}', [ProductController::class, 'events-destroy']);