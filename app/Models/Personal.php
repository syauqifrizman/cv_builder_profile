<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Personal extends Model
{
    protected $table = 'personals';
    protected $primaryKey = 'id';

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }
}
