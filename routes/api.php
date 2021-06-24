<?php

use App\Http\Controllers\ApiTestController;
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


Route::get('/test', [ApiTestController::class, 'testEndpoint'])->name('test.endpoint');

Route::get('/testdb', [ApiTestController::class, 'testDbTransaction'])->name('test.db');

Route::get('/validateuser/{user}', [ApiTestController::class, 'validateUser'])->name('validate.user');
