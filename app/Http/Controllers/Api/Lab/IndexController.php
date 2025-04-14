<?php

namespace App\Http\Controllers\Api\Lab;

use App\Http\Controllers\Controller;
use App\Http\Resources\LabResource;
use App\Models\Lab;

class IndexController extends Controller
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
