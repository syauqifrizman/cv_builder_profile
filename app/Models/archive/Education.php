<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    protected $table = 'educations';
    protected $primaryKey = 'education_id';

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }
}
