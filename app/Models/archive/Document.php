<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Document extends Model
{
    protected $table ="documents";
    protected $primaryKey = 'document_id';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function education(): HasMany
    {
        return $this->hasMany(Education::class, 'document_id', 'document_id');
    }

    public function experience(): HasMany
    {
        return $this->hasMany(Experience::class, 'document_id', 'document_id');
    }

    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function personal(): HasOne
    {
        // return $this->hasOne(Personal::class); error
        return $this->hasOne(Personal::class, 'document_id', 'document_id');
    }

    public function skill_other(): HasMany
    {
        return $this->hasMany(Skill_Other::class);
    }
}
