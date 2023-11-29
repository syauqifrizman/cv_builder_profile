<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Experience extends Model
{
    protected $table = 'experiences';
    protected $primaryKey = 'experience_id';

    public function exp_descriptions(): HasMany
    {
        return $this->hasMany(Exp_Description::class, 'experience_id', 'experience_id');
    }

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id', 'experience_id');
    }
}
