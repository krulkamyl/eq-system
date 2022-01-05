<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TypeAttribute extends Model
{
    use HasFactory;

    /**
     * Get type associated with type attribute
     *
     * @return HasOne
     */
    public function type() : HasOne
    {
        return $this->hasOne(Type::class, 'id', 'id_type');
    }

    /**
     * Get attribute associated with type attribute
     *
     * @return HasOne
     */
    public function attribute() : HasOne
    {
        return $this->hasOne(Attribute::class, 'id', 'id_attribute');
    }
}
