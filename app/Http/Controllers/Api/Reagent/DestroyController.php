<?php

namespace App\Http\Controllers\Api\Reagent;

use App\Http\Controllers\Controller;
use App\Models\Reagent;

class DestroyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Reagent $reagent)
    {
        $reagent->delete();
        return response()->json([], 204);
    }
}
