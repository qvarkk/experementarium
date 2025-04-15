<?php

namespace App\Http\Resources;

use App\Models\Lab;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LabStepResource extends JsonResource
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
            'lab' => new LabResource(Lab::find($this->lab_id)),
            'step_number' => $this->step_number,
            'instructions' => $this->instructions,
            'actions_json' => $this->actions_json,
        ];
    }
}
