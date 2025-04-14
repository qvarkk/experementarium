<?php

namespace App\Http\Controllers\Api\Reagent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reagent\UpdateRequest;
use App\Http\Resources\ReagentResource;
use App\Models\Reagent;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Reagent $reagent)
    {
        $data = $request->validated();
        $reagent->update($data);
        return new ReagentResource($reagent->fresh());
    }
}
