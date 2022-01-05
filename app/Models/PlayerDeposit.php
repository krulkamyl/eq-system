<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerDeposit extends Model
{
    use HasFactory;

    /**
     * Get attribute associated with deposit
     *
     * @return void
     */
    public function attribute() {
        return $this->hasOne(Attribute::class, 'id', 'id_attribute');
    }


    public function toArray()
    {
        return [
            'id' => $this->id,
            'id_player' => $this->id_player,
            'name' => $this->attribute->name,
            'value' => $this->value
        ];
    }

}
