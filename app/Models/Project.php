<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $table ="projects";
    protected $primaryKey = 'id';

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }
    public function projectDetail(): HasMany
    {
        return $this->hasMany(ProjectDetail::class);
    }
}
