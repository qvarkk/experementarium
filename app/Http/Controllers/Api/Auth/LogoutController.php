<?php

namespace App\Http\Controllers\Api\Auth;

class LogoutController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
