<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Type extends Model
{
    protected $table = 'types';
    protected $primaryKey = 'type_id';

    public function experience(): HasOne
    {
        return $this->hasOne(Experience::class, 'type_id', 'type_id');
    }
}
