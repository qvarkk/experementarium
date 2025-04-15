<?php

namespace App\Http\Controllers\Api\Lab;

use App\Http\Resources\LabResource;
use App\Models\Lab;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $labs = Lab::all();

        return LabResource::collection($labs);
    }
}
