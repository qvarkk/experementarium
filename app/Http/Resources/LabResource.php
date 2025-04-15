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
            'reagents' => ReagentResource::collection($this->reagents()->get()),
            'equipment' => EquipmentResource::collection($this->equipment()->get()),
        ];
    }
}
