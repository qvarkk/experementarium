<?php

namespace App\Http\Controllers\Api\Reagent;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReagentResource;
use App\Models\Reagent;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $reagent = Reagent::all();

        return ReagentResource::collection($reagent);
    }
}
