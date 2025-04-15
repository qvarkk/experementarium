<?php

use Illuminate\Support\Facades\Route;


Route::namespace('App\\Http\\Controllers\\Web')->group(function () {
    Route::get('/', IndexController::class)->name('index');

    Route::namespace('Lab')->group(function () {
        Route::get('/labs/create', CreateController::class)->name('web.lab.create');
    });
});
