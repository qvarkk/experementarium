<?php

namespace App\Http\Controllers\Api\LabStep;

use App\Http\Controllers\Controller;
use App\Http\Requests\LabStep\StoreRequest;
use App\Http\Resources\LabStepResource;
use App\Models\LabStep;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $lab_step = LabStep::create($data);
        return new LabStepResource($lab_step);
    }
}
