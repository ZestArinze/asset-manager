<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\UserController;
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

Route::get('/', [AssetController::class, 'home'])->name('home');
Route::get('/users/{id}/assets/', [AssetController::class, 'userAssets'])->name('user.assets');
Route::get('/groups/{id}/assets', [AssetController::class, 'groupAssets'])->name('group.assets');
