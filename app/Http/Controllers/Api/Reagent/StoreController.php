<?php

namespace App\Http\Controllers\Api\Reagent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reagent\StoreRequest;
use App\Http\Resources\ReagentResource;
use App\Models\Reagent;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $reagent = Reagent::firstOrCreate($data);
        return new ReagentResource($reagent);
    }
}
