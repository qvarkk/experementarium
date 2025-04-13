<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lab extends Model
{
    protected $guarded = false;
    protected $table = 'labs';

    public function reagents(): BelongsToMany {
        return $this->belongsToMany(Reagent::class, 'labs_reagents', 'lab_id', 'reagent_id');
    }

    public function equipment(): BelongsToMany {
        return $this->belongsToMany(Equipment::class, 'labs_equipment', 'lab_id', 'equipment_id');
    }

    public function tags(): BelongsToMany {
        return $this->belongsToMany(Tag::class, 'labs_tags', 'lab_id', 'tag_id');
    }

    public function steps(): HasMany {
        return $this->hasMany(LabStep::class, 'lab_id');
    }
}
