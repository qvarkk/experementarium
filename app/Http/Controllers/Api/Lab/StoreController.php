<?php

namespace App\Http\Controllers\Api\Lab;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lab\StoreRequest;
use App\Http\Resources\LabResource;
use App\Models\Lab;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $lab = Lab::firstOrCreate($data);
        return new LabResource($lab);
    }
}
