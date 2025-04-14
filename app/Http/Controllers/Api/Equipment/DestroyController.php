<?php

namespace App\Http\Controllers\Api\Equipment;

use App\Http\Controllers\Controller;
use App\Models\Equipment;

class DestroyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Equipment $equipment)
    {
        $equipment->delete();
        return response()->json([], 204);
    }
}
