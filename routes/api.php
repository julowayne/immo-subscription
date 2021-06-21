<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiNewsController;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/register', [ApiAuthController::class , 'register']);
Route::post('auth/login', [ApiAuthController::class , 'login']);
Route::post('contact', [ApiAuthController::class , 'sendMail']);

Route::get('news', [ApiNewsController::class , 'showNews']);

