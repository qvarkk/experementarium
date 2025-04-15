<?php

namespace App\Http\Controllers\Api\LabStep;

use App\Http\Controllers\Controller;
use App\Models\LabStep;

class DestroyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LabStep $lab_step)
    {
        $lab_step->delete();
        return response()->json([], 204);
    }
}
