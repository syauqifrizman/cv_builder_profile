<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Document extends Model
{
    protected $table ="documents";
    protected $primaryKey = 'document_id';

    /**
     * Get the user that owns the Document
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function personal(): HasOne
    {
        return $this->hasOne(Personal::class);
    }

    public function education(): HasMany
    {
        return $this->hasMany(Education::class);
    }

    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function skill_other(): HasMany
    {
        return $this->hasMany(Skill_Other::class);
    }

    public function experience(): HasMany
    {
        return $this->hasMany(Experience::class);
    }
}
