<?php

namespace App\Http\Controllers\Api\Lab;

use App\Http\Requests\Lab\StoreRequest;
use App\Http\Resources\LabResource;
use App\Models\Lab;

class StoreController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $lab = $this->service->store($data);

        if ($lab instanceof Lab) {
            return new LabResource($lab);
        }

        return response()->json($lab, 500);
    }
}
