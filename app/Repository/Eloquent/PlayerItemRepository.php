<?php

namespace App\Repository\Eloquent;

use App\Models\PlayerItem;
use App\Repository\PlayerItemRepositoryInterface;


class PlayerItemRepository implements PlayerItemRepositoryInterface {

    private PlayerItem $playerItemModel;

    public function __construct(PlayerItem $playerItemModel)
    {
        $this->playerItemModel = $playerItemModel;
    }

    public function createModel(array $data): PlayerItem
    {
        $this->playerItemModel->id_player = $data['id_player'];
        $this->playerItemModel->id_item = $data['id_item'];

        $this->playerItemModel->save();

        return $this->playerItemModel;
    }

}
