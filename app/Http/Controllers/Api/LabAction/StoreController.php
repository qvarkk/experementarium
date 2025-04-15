<?php

namespace App\Http\Controllers\Api\LabAction;

use App\Http\Controllers\Controller;
use App\Http\Requests\LabAction\StoreRequest;
use App\Http\Resources\LabActionResource;
use App\Models\LabAction;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $lab_action = LabAction::firstOrCreate($data);
        return new LabActionResource($lab_action);
    }
}
