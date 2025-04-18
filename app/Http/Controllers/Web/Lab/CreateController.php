<?php

namespace App\Http\Controllers\Web\Lab;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\LabAction;
use App\Models\Reagent;
use Inertia\Inertia;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $reagents = Reagent::all()->toResourceCollection()->resolve();
        $equipment = Equipment::all()->toResourceCollection()->resolve();
        $lab_actions = LabAction::all()->toResourceCollection()->resolve();

        return Inertia::render('Lab/Create', [
            'reagents' => $reagents,
            'equipment' => $equipment,
            'lab_actions' => $lab_actions,
            'store_url' => route('web.lab.store'),
            'title' => 'Создание лабораторной работы'
        ]);
    }
}
