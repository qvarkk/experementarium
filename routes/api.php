<?php

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::namespace('App\\Http\\Controllers\\Api')->group(function () {
    Route::namespace('Tag')->group(function () {
       Route::get('/tags', IndexController::class)->name('api.tag.index');
       Route::get('/tags/{tag}', ShowController::class)->name('api.tag.show');
       Route::post('/tags', StoreController::class)->name('api.tag.store');
       Route::patch('/tags/{tag}', UpdateController::class)->name('api.tag.update');
       Route::delete('/tags/{tag}', DestroyController::class)->name('api.tag.destroy');
    });
});
