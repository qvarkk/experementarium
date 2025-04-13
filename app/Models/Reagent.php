<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reagent extends Model
{
    protected $guarded = false;
    protected $table = 'reagents';

    public function labs(): BelongsToMany {
        return $this->belongsToMany(Lab::class, 'labs_reagents', 'reagent_id', 'lab_id');
    }

    public function step_actions(): BelongsToMany {
        return $this->belongsToMany(StepAction::class, 'step_actions_reagents', 'reagent_id', 'step_action_id');
    }
}
