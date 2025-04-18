<?php

namespace App\Http\Controllers\Web\Lab;

use App\Http\Requests\Lab\StoreRequest;
use App\Models\Lab;

class StoreController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $lab = $this->service->store($data);

        if ($lab instanceof Lab) {
            return to_route('web.lab.create');
        }

        return redirect()->back()->withErrors([
            'message' => $lab
        ]);
    }
}
