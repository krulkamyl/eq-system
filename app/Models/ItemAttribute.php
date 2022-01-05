<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ItemAttribute extends Model
{
    use HasFactory;

    /**
     * Get item attributes associated with item
     *
     * @return HasOne
     */
    public function item() : HasOne
    {
        return $this->hasOne(Item::class, 'id', 'id_item');
    }

    /**
     * Get attribute associated with item attributes
     *
     * @return HasOne
     */
    public function attribute() : HasOne
    {
        return $this->hasOne(Attribute::class, 'id', 'id_attribute');
    }

    /**
     * Formatting response
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'name' => $this->attribute->name,
            'value' => $this->value
        ];
    }
}
