<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCostAttribute extends Model
{
    use HasFactory;

    /**
     * Get item attributes associated with item
     *
     * @return void
     */
    public function item() {
        return $this->hasOne(Item::class, 'id', 'id_item');
    }

    /**
     * Get attribute associated with item attributes
     *
     * @return void
     */
    public function attribute() {
        return $this->hasOne(Attribute::class, 'id', 'id_attribute');
    }
    
    /**
     * Beautify response
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->attribute->name,
            'value' => $this->value
        ];
    }
}
