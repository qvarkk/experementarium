<?php

namespace App\Http\Controllers\Api\Lab;

use App\Http\Controllers\Controller;
use App\Models\Lab;

class DestroyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Lab $lab)
    {
        $lab->delete();
        return response()->json([], 204);
    }
}
