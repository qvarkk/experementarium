<?php

use Illuminate\Support\Facades\Route;


Route::namespace('App\\Http\\Controllers\\Web')->group(function () {
    Route::inertia('/', 'Index')->name('web.index');

    Route::namespace('Lab')->group(function () {
        Route::get('/labs', IndexController::class)->name('web.lab.index');
        Route::get('/labs/create', CreateController::class)->name('web.lab.create');
        Route::post('/labs', StoreController::class)->name('web.lab.store');
    });
});
