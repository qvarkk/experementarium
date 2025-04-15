<?php

namespace App\Http\Controllers\Api\LabAction;

use App\Http\Controllers\Controller;
use App\Http\Requests\LabAction\UpdateRequest;
use App\Http\Resources\LabActionResource;
use App\Models\LabAction;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, LabAction $lab_action)
    {
        $data = $request->validated();
        $lab_action->update($data);
        return new LabActionResource($lab_action->fresh());
    }
}
