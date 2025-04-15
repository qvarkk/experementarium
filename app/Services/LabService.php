<?php

namespace App\Services;

use App\Models\Lab;
use Illuminate\Support\Facades\DB;

class LabService
{
    public function store($data) {
        try {
            DB::beginTransaction();

            $reagent_ids = [];
            foreach (($data['reagents'] ?? []) as $reagent) {
                $reagent_ids[$reagent['id']] = ['quantity' => $reagent['quantity']];
            }
            unset($data['reagents']);

            $equipment_ids = [];
            foreach (($data['equipment'] ?? []) as $equipment) {
                $equipment_ids[$equipment['id']] = ['quantity' => $equipment['quantity']];
            }
            unset($data['equipment']);

            $lab = Lab::create($data);
            $lab->reagents()->sync($reagent_ids);
            $lab->equipment()->sync($equipment_ids);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }

        return $lab;
    }

    public function update() {

    }
}
