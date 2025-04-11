<?php

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Response::json([
        'message' => 'Hello, World!'
    ]);
});
