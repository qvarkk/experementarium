<?php

namespace App\Http\Controllers\Api\Equipment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Equipment\UpdateRequest;
use App\Http\Resources\EquipmentResource;
use App\Models\Equipment;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Equipment $equipment)
    {
        $data = $request->validated();
        $equipment->update($data);
        return new EquipmentResource($equipment->fresh());
    }
}
