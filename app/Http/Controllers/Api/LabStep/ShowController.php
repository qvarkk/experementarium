<?php

namespace App\Http\Controllers\Api\LabStep;

use App\Http\Controllers\Controller;
use App\Http\Resources\LabStepResource;
use App\Models\LabStep;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LabStep $lab_step)
    {
        return new LabStepResource($lab_step);
    }
}
