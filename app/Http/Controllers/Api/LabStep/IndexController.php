<?php

namespace App\Http\Controllers\Api\LabStep;

use App\Http\Controllers\Controller;
use App\Http\Resources\LabStepResource;
use App\Models\LabStep;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $lab_steps = LabStep::all();

        return LabStepResource::collection($lab_steps);
    }
}
