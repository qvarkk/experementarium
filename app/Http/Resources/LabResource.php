<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LabResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'purpose' => $this->purpose,
            'safety_rules' => $this->safety_rules,
            'theoretical_basis' => $this->theoretical_basis,
            'reagents' => $this->reagents->map(function ($reagent) {
                return [
                    'reagent' => new ReagentResource($reagent),
                    'quantity' => $reagent->pivot->quantity
                ];
            }),
            'equipment' => $this->equipment->map(function ($equipment) {
                return [
                    'equipment' => new EquipmentResource($equipment),
                    'quantity' => $equipment->pivot->quantity
                ];
            }),
        ];
    }
}
