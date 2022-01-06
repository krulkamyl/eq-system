<?php

namespace App\Models;

use App\Repository\Eloquent\PlayerItemAttributeRepository;
use App\Repository\Eloquent\PlayerItemRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PlayerItemAttribute extends Model
{
    use HasFactory;

    /**
     * Get player item associated with player item attribute
     *
     * @return HasOne
     */
    public function playerItem() : HasOne
    {
        return $this->hasOne(PlayerItem::class, 'id', 'id_item_player');
    }


    /**
     * Get attribute associated with player item attribute
     *
     * @return HasOne
     */
    public function attribute() : HasOne
    {
        return $this->hasOne(Attribute::class, 'id', 'id_attribute');
    }

    public static function assignItemAttributeToPlayerItem(PlayerItem $playerItem) : PlayerItemAttribute
    {
        $playerItemAttributeRepository = new PlayerItemAttributeRepository();

        return $playerItemAttributeRepository->createModel([
            'id_player_item' => $playerItem->id,
            'id_attribute' => Attribute::whereName('status')->first()->id,
            'value' => 0
        ]);
    }
}
