<?php

use Weegy\Todos\App\Http\Controllers\TodoController;

Route::middleware([ 'web', 'auth' ])->group(function () {
    Route::prefix('aufgabe')->group(function () {
        Route::get('/new', [TodoController::class, 'create'])->name('todo.create');
        Route::get('/show/{todo}', [TodoController::class, 'show'])->name('todo.show');
        Route::post('/store', [TodoController::class, 'store'])->name('todo.store');
        Route::get('/edit', [TodoController::class, 'edit'])->name('todo.edit');
    });
});
