<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill_Other extends Model
{
    // use HasFactory;
    protected $table ="Skills_Others";
    protected $primaryKey = 'skill_other_id';

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }
}
