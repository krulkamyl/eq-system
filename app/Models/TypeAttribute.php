<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAttribute extends Model
{
    use HasFactory;

    /**
     * Get type associated with type attribute
     * 
     * @return void
     */
    public function type() {
        return $this->hasOne(Type::class, 'id', 'id_type');
    }

    /**
     * Get attribute associated with type attribute
     * 
     * @return void
     */
    public function attribute() {
        return $this->hasOne(Attribute::class, 'id', 'id_attribute');
    }
}
