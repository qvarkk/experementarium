<?php

namespace App\Http\Controllers\Web\Lab;

use App\Http\Controllers\Controller;
use App\Http\Resources\LabResource;
use App\Models\Lab;
use Inertia\Inertia;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $labs = Lab::paginate(6)->toResourceCollection();

        return Inertia::render('Lab/Index', [
           'paginatedLabs' => $labs
        ]);
    }
}
