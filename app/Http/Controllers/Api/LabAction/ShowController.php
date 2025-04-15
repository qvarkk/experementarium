<?php

namespace App\Http\Controllers\Api\LabAction;

use App\Http\Controllers\Controller;
use App\Http\Resources\LabActionResource;
use App\Models\LabAction;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LabAction $lab_action)
    {
        return new LabActionResource($lab_action);
    }
}
