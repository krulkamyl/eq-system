<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;


    /**
     * Get type associated with item
     * 
     * @return void
     */
    public function type() {
        return $this->hasOne(Type::class, 'id', 'id_type');
    }

    /**
     * Get item attributes associated with item
     *
     * @return void
     */
    public function itemAttributes() {
        return $this->hasMany(ItemAttribute::class, 'id_item', 'id');
    }

    /**
     * Get item cost attributes associated with item
     *
     * @return void
     */
    public function itemCostAttributes() {
        return $this->hasMany(ItemCostAttribute::class, 'id_item', 'id');
    }


    /**
     * Beautify response
     *
     * @return array
     */
    public function toArray(): array {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'type' => $this->type->name,
            'attributes' => $this->itemAttributes->toArray(),
            'costs' => $this->itemCostAttributes->toArray()
        ];
    }
}
