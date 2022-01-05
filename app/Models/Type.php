<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    /**
     * Get attributes associated with this type
     *
     * @return HasMany
     */
    public function attributes(): HasMany
    {
        return $this->hasMany(TypeAttribute::class, 'id_type', 'id');
    }
}
