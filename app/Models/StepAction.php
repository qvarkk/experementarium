<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StepAction extends Model
{
    protected $guarded = false;
    protected $table = 'step_actions';

    public function reagents(): BelongsToMany {
        return $this->belongsToMany(Reagent::class, 'step_actions_reagents', 'step_action_id', 'reagent_id');
    }

    public function equipment(): BelongsToMany {
        return $this->belongsToMany(Equipment::class, 'step_actions_equipments', 'step_action_id', 'equipment_id');
    }
}
