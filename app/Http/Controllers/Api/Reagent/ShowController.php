<?php

namespace App\Http\Controllers\Api\Reagent;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReagentResource;
use App\Models\Reagent;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Reagent $reagent)
    {
        return new ReagentResource($reagent);
    }
}
