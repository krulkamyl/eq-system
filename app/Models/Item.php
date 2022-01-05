<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    use HasFactory;


    /**
     * Get type associated with item
     *
     * @return HasOne
     */
    public function type() : HasOne
    {
        return $this->hasOne(Type::class, 'id', 'id_type');
    }

    /**
     * Get item attributes associated with item
     *
     * @return HasMany
     */
    public function itemAttributes() : HasMany
    {
        return $this->hasMany(ItemAttribute::class, 'id_item', 'id');
    }

    /**
     * Get item cost attributes associated with item
     *
     * @return HasMany
     */
    public function itemCostAttributes() : HasMany
    {
        return $this->hasMany(ItemCostAttribute::class, 'id_item', 'id');
    }


    /**
     * Formatting response
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
