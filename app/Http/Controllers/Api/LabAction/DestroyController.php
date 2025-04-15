<?php

namespace App\Http\Controllers\Api\LabAction;

use App\Http\Controllers\Controller;
use App\Models\LabAction;

class DestroyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LabAction $lab_action)
    {
        $lab_action->delete();
        return response()->json([], 204);
    }
}
