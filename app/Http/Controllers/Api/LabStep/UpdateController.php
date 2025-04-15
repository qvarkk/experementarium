<?php

namespace App\Http\Controllers\Api\LabStep;

use App\Http\Controllers\Controller;
use App\Http\Requests\LabStep\UpdateRequest;
use App\Http\Resources\LabStepResource;
use App\Models\LabStep;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, LabStep $lab_step)
    {
        $data = $request->validated();
        $lab_step->update($data);
        return new LabStepResource($lab_step->fresh());
    }
}
