<?php

namespace App\Http\Controllers\Api\Auth;

class RefreshController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return $this->respondWithToken(auth()->refresh());
    }
}
