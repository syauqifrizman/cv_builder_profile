<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SkillOther extends Model
{
    protected $table ="skill_others";
    protected $primaryKey = 'id';

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }
}
