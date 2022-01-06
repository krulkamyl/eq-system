<?php

namespace App\Repository\Eloquent;

use App\Models\PlayerItemAttribute;

class PlayerItemAttributeRepository
{
    private PlayerItemAttribute $playerItemAttributeModel;

    public function __construct(PlayerItemAttribute $playerItemAttributeModel = null)
    {
        if (is_null($playerItemAttributeModel))
            $playerItemAttributeModel = new PlayerItemAttribute();

        $this->playerItemAttributeModel = $playerItemAttributeModel;
    }

    public function createModel(array $data): PlayerItemAttribute
    {
        $this->playerItemAttributeModel->id_player_item = $data['id_player_item'];
        $this->playerItemAttributeModel->id_attribute = $data['id_attribute'];
        $this->playerItemAttributeModel->value = $data['value'];

        $this->playerItemAttributeModel->save();

        return $this->playerItemAttributeModel;
    }

}
