<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    // use HasFactory;
    protected $table ="Projects";
    protected $primaryKey = 'project_id';

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }
    public function detail(): HasMany
    {
        return $this->hasMany(Detail::class);
    }
}
