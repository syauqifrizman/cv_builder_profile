<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pr_Detail extends Model
{
    // use HasFactory;
    protected $table ="Pr_Details";
    protected $primaryKey = 'detail_id';

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }
}
