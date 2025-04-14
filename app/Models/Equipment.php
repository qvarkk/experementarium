<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Equipment extends Model
{
    protected $guarded = false;
    protected $table = 'equipment';

    public function labs(): BelongsToMany {
        return $this->belongsToMany(Lab::class, 'labs_reagents', 'equipment_id', 'lab_id');
    }
}
