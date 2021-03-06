<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PlayerDeposit extends Model
{
    use HasFactory;

    /**
     * Get attribute associated with deposit
     *
     * @return void
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
    public function toArray() : array
    {
        return [
            'id_player' => $this->id_player,
            'name' => $this->attribute->name,
            'value' => $this->value
        ];
    }

}
