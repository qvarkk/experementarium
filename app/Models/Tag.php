<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $guarded = false;
    protected $table = 'tags';

    public function labs(): BelongsToMany {
        return $this->belongsToMany(Lab::class, 'lab_tags', 'tag_id', 'lab_id');
    }
}
