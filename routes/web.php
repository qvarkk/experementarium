<?php

use Illuminate\Support\Facades\Route;


Route::namespace('App\\Http\\Controllers\\Web')->group(function () {
    Route::inertia('/', 'Index')->name('web.index');
    Route::inertia('/about', 'About')->name('web.about');
    Route::inertia('/team', 'Team')->name('web.team');
    Route::inertia('/contacts', 'Contacts')->name('web.contacts');
    Route::inertia('/game', 'Game')->name('web.game');

//    Route::namespace('Lab')->group(function () {
//        Route::get('/labs', IndexController::class)->name('web.lab.index');
//        Route::get('/labs/create', CreateController::class)->name('web.lab.create');
//        Route::post('/labs', StoreController::class)->name('web.lab.store');
//    });
});
