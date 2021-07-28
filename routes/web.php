<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\TeamsController;
use App\Mail\WelcomeMail;
use illuminate\Support\Facades\Mail;
use Illuminate\Routing\RouteGroup;
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




Route::group([
    'middleware'=>'guest'
], function(){
    Route::get('/register', [AuthController::class, 'registerForm']);
    Route::get('/login', [AuthController::class, 'loginForm']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});
Route::group([
    'middleware'=>'auth'
], function(){
    Route::get('/', [TeamsController::class, 'index'] );
    Route::get('/teams/{id}', [TeamsController::class, 'show']);
    Route::get('/players', [PlayersController::class, 'index']);
    Route::get('/players/{id}', [PlayersController::class, 'show']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/teams/{team}/comments', [CommentsController::class, 'store'])->name('team.comment');


});
