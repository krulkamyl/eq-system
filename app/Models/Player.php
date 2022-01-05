<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Repository\Eloquent\ItemPlayerRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;
    
    public function deposit() {
        return $this->hasMany(PlayerDeposit::class, 'id_player', 'id');
    }
    
    public function itemPlayer() {
        return $this->hasMany(ItemPlayer::class, 'id_player', 'id');
    }


    /**
     * Check if player have enough attributes to buy item
     *
     * @param string $name
     * @param float $cost
     * @return bool
     */
    public function checkEnoughAttributes(string $name, float $cost) {
        foreach ($this->deposit as $deposit) {
            if ($deposit->attribute->name == $name) {
                return ($cost <= $deposit->value);
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
    public function substractionAttributes(string $name, float $cost) {
        foreach ($this->deposit as $deposit) {
            if ($deposit->attribute->name == $name && ($cost <= $deposit->value)) {
                $value = $this->deposit->value - $cost;
                $this->deposit->playerDepositRepository->updateModel([
                    'value' => $value
                ]);
                return true;
            }
        }
        return false;
    }


    public function assignItemToUser(Item $item) {
        $itemPlayer = new ItemPlayer();

        $itemPlayerRepository = new ItemPlayerRepository($itemPlayer);

        $itmPlayr = $itemPlayerRepository->createModel([
            'id_player' => $this->id,
            'id_item' => $item->id
        ]);

        if ($item->type->id = Type::whereName('prize')->first()->id) {

            // TODO: create using repository 
            
            $playerAttribute = new ItemPlayerAttribute();

            $playerAttribute->id_item_player = $itmPlayr->id;
            $playerAttribute->id_attribute = Attribute::whereName('status')->first()->id;
            $playerAttribute->value = '0';
            dd($playerAttribute);
            $playerAttribute->save();   
        }

        return true;
    }


    public function buyItem(Item $item) {
        $canUserBuy = true;

        foreach ($item->itemCostAttributes as $costAttribute) {
            if (!$this->checkEnoughAttributes($costAttribute->attribute->name, $costAttribute->value)) {
               $canUserBuy = false;
            }
        }

        if ($canUserBuy) {
            foreach ($item->itemCostAttributes as $costAttribute) {
                
                // $this->substractionAttributes($costAttribute->attribute->name, $costAttribute->value);
                $this->assignItemToUser($item);
                return true;
            }
        } else return false;
    }


}
