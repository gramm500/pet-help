<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\GameController;
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
    return redirect('register');
});

Auth::routes();
Route::middleware('auth')->get('/play', function () {
    return view('play');
});

Route::group(['middleware' => 'auth'], static function () {
    Route::post('/play', [GameController::class, 'play']);
    Route::get('/rewards', [GameController::class, 'getRewards']);
    Route::post('/get-reward/{reward}', [GameController::class, 'getReward']);
    Route::delete('/delete/{reward}', [GameController::class, 'refuseReward']);
});

