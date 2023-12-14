<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Document extends Model
{
    protected $table ="documents";
    protected $primaryKey = 'id';

    protected $guarded = [
        'id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function education(): HasMany
    {
        // return $this->hasMany(Education::class, 'document_id', 'document_id');
        return $this->hasMany(Education::class);
    }

    public function experience(): HasMany
    {
        // return $this->hasMany(Experience::class, 'document_id', 'document_id');
        return $this->hasMany(Experience::class);
    }

    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function personal(): HasOne
    {
        // return $this->hasOne(Personal::class, 'document_id', 'document_id');
        return $this->hasOne(Personal::class);
    }

    public function skillOther(): HasMany
    {
        return $this->hasMany(SkillOther::class);
    }
}
