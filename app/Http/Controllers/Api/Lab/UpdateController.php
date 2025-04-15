<?php

namespace App\Http\Controllers\Api\Lab;

use App\Http\Requests\Lab\UpdateRequest;
use App\Http\Resources\LabResource;
use App\Models\Lab;

class UpdateController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Lab $lab)
    {
        $data = $request->validated();
        $lab = $this->service->update($lab, $data);

        if ($lab instanceof Lab) {
            return new LabResource($lab);
        }

        return response()->json($lab, 500);
    }
}
