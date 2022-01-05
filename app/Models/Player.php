<?php

namespace App\Models;

use App\Repository\Eloquent\PlayerDepositRepository;
use App\Repository\Eloquent\PlayerItemAttributeRepository;
use Illuminate\Database\Eloquent\Model;
use App\Repository\Eloquent\PlayerItemRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Player extends Model
{
    use HasFactory;

    /**
     * Get user deposit
     *
     * @return HasMany
     */
    public function deposit(): HasMany
    {
        return $this->hasMany(PlayerDeposit::class, 'id_player', 'id');
    }

    /**
     * Get player items associated with player
     *
     * @return HasMany
     */
    public function playerItems(): HasMany
    {
        return $this->hasMany(PlayerItem::class, 'id_player', 'id');
    }


    /**
     * Check if player have enough attributes to buy item
     *
     * @param Item $item
     * @return bool
     */
    public function checkEnoughAttributes(Item $item): bool
    {
        foreach ($item->itemCostAttributes as $costAttribute)
        {
            foreach ($this->deposit as $deposit) {
                if ($costAttribute->attribute->name == $deposit->attribute->name)
                    return ($costAttribute->value <= $deposit->value);
            }
        }
        return false;
    }

    /**
     * Subtraction of attributes for player
     *
     * @param string $name
     * @param float $cost
     * @return bool
     *
     */
    public function subtractionAttributes(string $name, float $cost): bool
    {
        foreach ($this->deposit as $deposit)
        {
            if ($deposit->attribute->name == $name && ($cost <= $deposit->value)) {

                $playerDepositRepository = new PlayerDepositRepository($deposit);

                $playerDepositRepository->updateModel($deposit, [
                    'value' => $deposit->value - $cost
                ]);

                return true;
            }
        }
        return false;
    }

    /**
     * Buing item
     *
     * @param Item $item
     * @return bool
     */
    public function buyItem(Item $item) : bool
    {
        if ($this->checkEnoughAttributes($item)) {
            foreach ($item->itemCostAttributes as $costAttribute)
            {
                $this->subtractionAttributes($costAttribute->attribute->name, $costAttribute->value);
                PlayerItem::assignPlayerToItem($this, $item);
                return true;
            }
        }
        return false;
    }


}
