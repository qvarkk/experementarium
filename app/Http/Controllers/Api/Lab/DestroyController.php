<?php

namespace App\Http\Controllers\Api\Lab;

use App\Models\Lab;

class DestroyController extends BaseController
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
