<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LabAction extends Model
{
    protected $guarded = false;
    protected $table = 'lab_actions';

    public function step_actions(): HasMany {
        return $this->hasMany(StepAction::class, 'lab_action_id', 'id');
    }
}
