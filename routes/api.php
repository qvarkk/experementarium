<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\\Http\\Controllers\\Api')->group(function () {
    Route::namespace('Tag')->group(function () {
       Route::get('/tags', IndexController::class)->name('api.tag.index');
       Route::get('/tags/{tag}', ShowController::class)->name('api.tag.show');
       Route::post('/tags', StoreController::class)->name('api.tag.store');
       Route::patch('/tags/{tag}', UpdateController::class)->name('api.tag.update');
       Route::delete('/tags/{tag}', DestroyController::class)->name('api.tag.destroy');
    });

    Route::namespace('Equipment')->group(function () {
        Route::get('/equipment', IndexController::class)->name('api.equipment.index');
        Route::get('/equipment/{equipment}', ShowController::class)->name('api.equipment.show');
        Route::post('/equipment', StoreController::class)->name('api.equipment.store');
        Route::patch('/equipment/{equipment}', UpdateController::class)->name('api.equipment.update');
        Route::delete('/equipment/{equipment}', DestroyController::class)->name('api.equipment.destroy');
    });

    Route::namespace('Reagent')->group(function () {
        Route::get('/reagents', IndexController::class)->name('api.equipment.index');
        Route::get('/reagents/{reagent}', ShowController::class)->name('api.reagents.show');
        Route::post('/reagents', StoreController::class)->name('api.reagents.store');
        Route::patch('/reagents/{reagent}', UpdateController::class)->name('api.reagents.update');
        Route::delete('/reagents/{reagent}', DestroyController::class)->name('api.reagents.destroy');
    });
});
