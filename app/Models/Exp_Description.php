<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exp_Description extends Model
{
    protected $table = 'exp_descriptions';
    protected $primaryKey = 'detail_id';

    public function experience(): BelongsTo
    {
        return $this->belongsTo(Experience::class, 'experience_id', 'detail_id');
    }
}
