<?php

namespace App\Services;

use App\Models\Lab;
use Illuminate\Support\Facades\DB;

class LabService
{
    public function store($data): Lab|string
    {
        try {
            DB::beginTransaction();

            $reagent_ids = $this->extractIdsAndQuantity($data['reagents']);
            unset($data['reagents']);

            $equipment_ids = $this->extractIdsAndQuantity($data['equipment']);
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

    public function update(Lab $lab, $data): Lab|string
    {
        try {
            DB::beginTransaction();

            $update_reagents = false;
            if (isset($data['reagents'])) $update_reagents = true;
            $reagent_ids = $this->extractIdsAndQuantity($data['reagents'] ?? []);
            unset($data['reagents']);

            $update_equipment = false;
            if (isset($data['equipment'])) $update_equipment = true;
            $equipment_ids = $this->extractIdsAndQuantity($data['equipment'] ?? []);
            unset($data['equipment']);

            $lab->update($data);
            if ($update_reagents) $lab->reagents()->sync($reagent_ids);
            if ($update_equipment) $lab->equipment()->sync($equipment_ids);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }

        return $lab->fresh();
    }

    private function extractIdsAndQuantity($arr): array
    {
        $ids_with_quantity = [];
        foreach ($arr as $item) {
            $ids_with_quantity[$item['id']] = ['quantity' => $item['quantity']];
        }
        return $ids_with_quantity;
    }
}
