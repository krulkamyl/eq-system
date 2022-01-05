<?php

namespace App\Models;

use App\Repository\Eloquent\PlayerItemRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PlayerItem extends Model
{
    use HasFactory;

    /**
     * Get item attributes associated with item
     *
     * @return HasOne
     */
    public function item(): HasOne
    {
        return $this->hasOne(Item::class, 'id', 'id_item');
    }

    /**
     * Get attribute associated with item attributes
     *
     * @return HasOne
     */
    public function attribute(): HasOne
    {
        return $this->hasOne(Attribute::class, 'id', 'id_attribute');
    }

    /**
     * Assigning a purchased item to a user
     *
     * @param Player $player
     * @param Item $item
     * @return PlayerItem
     */
    public static function assignPlayerToItem(Player $player, Item $item) : PlayerItem
    {
        $playerItem = new PlayerItem();

        $playerItemRepository = new PlayerItemRepository($playerItem);

        $playerItem =  $playerItemRepository->createModel([
            'id_player' => $player->id,
            'id_item' => $item->id
        ]);

        if ($item->type->id == Type::whereName('prize')->first()->id)
            PlayerItemAttribute::assignItemAttributeToPlayerItem($playerItem);

        return $playerItem;
    }

    /**
     * Beautify response
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
