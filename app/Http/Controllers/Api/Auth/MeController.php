<?php

namespace App\Http\Controllers\Api\Auth;

class MeController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return response()->json(auth()->user());
    }
}
