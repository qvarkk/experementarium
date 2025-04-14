<?php

namespace App\Http\Controllers\Api\Equipment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Equipment\StoreRequest;
use App\Http\Resources\EquipmentResource;
use App\Models\Equipment;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $equipment = Equipment::firstOrCreate($data);
        return new EquipmentResource($equipment);
    }
}
