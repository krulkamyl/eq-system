<?php

namespace App\Repository\Eloquent;

use App\Models\ItemPlayer;
use App\Repository\ItemPlayerRepositoryInterface;


class ItemPlayerRepository implements ItemPlayerRepositoryInterface {

    private ItemPlayer $itemPlayerModel;

    public function __construct(ItemPlayer $itemPlayerModel)
    {
        $this->itemPlayerModel = $itemPlayerModel;
    }

    public function createModel(array $data): ItemPlayer
    {
        $this->itemPlayerModel->id_player = $data['id_player'];
        $this->itemPlayerModel->id_item = $data['id_item'];
        
        $this->itemPlayerModel->save();

        return $this->itemPlayerModel;
    }

}