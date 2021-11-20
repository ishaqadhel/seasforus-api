<?php

use App\Http\Controllers\Auth0Controller;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/auth0-endpoints/callback', [Auth0Controller::class, 'callback'])->name('auth0-callback');
Route::get('/auth0-endpoints/login', [Auth0Controller::class, 'login'])->name('auth0-login');
Route::get('/auth0-endpoints/logout', [Auth0Controller::class, 'logout'])->name('auth0-logout');
Route::get('/auth0-endpoints/info', [Auth0Controller::class, 'info'])->name('auth0-info');