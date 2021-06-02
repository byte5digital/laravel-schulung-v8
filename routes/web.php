<?php

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

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::prefix('aufgabe')->group(function(){
        Route::get('/new', [App\Http\Controllers\TodoController::class, 'create'])->name('todo.create');
        Route::get('/show/{todo}', [App\Http\Controllers\TodoController::class, 'show'])->name('todo.show');
        Route::post('/store', [App\Http\Controllers\TodoController::class, 'store'])->name('todo.store');
        Route::get('/edit', [App\Http\Controllers\TodoController::class, 'edit'])->name('todo.edit');
    });

    // Route::get('/home', 'HomeController@index')->name('home');
});

