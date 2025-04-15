<?php

namespace App\Http\Controllers\Api\LabAction;

use App\Http\Controllers\Controller;
use App\Http\Resources\LabActionResource;
use App\Models\LabAction;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $lab_actions = LabAction::all();

        return LabActionResource::collection($lab_actions);
    }
}
