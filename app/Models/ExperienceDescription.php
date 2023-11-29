<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExperienceDescription extends Model
{
    protected $table = 'experience_descriptions';
    protected $primaryKey = 'id';

    public function experience(): BelongsTo
    {
        // return $this->belongsTo(Experience::class, 'experience_id', 'detail_id');
        return $this->belongsTo(Experience::class);
    }
}
