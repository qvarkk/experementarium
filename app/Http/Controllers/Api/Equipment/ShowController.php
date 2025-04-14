<?php

namespace App\Http\Controllers\Api\Equipment;

use App\Http\Controllers\Controller;
use App\Http\Resources\EquipmentResource;
use App\Models\Equipment;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Equipment $equipment)
    {
        return new EquipmentResource($equipment);
    }
}
