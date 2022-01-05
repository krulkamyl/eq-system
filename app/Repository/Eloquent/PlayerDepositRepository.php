<?php

namespace App\Repository\Eloquent;

use App\Models\PlayerDeposit;
use App\Repository\PlayerDepositRepositoryInterface;

class PlayerDepositRepository implements PlayerDepositRepositoryInterface {

    private PlayerDeposit $playerDepositModel;

    public function __construct(PlayerDeposit $playerDepositModel)
    {
        $this->playerDepositModel = $playerDepositModel;
    }

    public function createModel(array $data): PlayerDeposit
    {
        $this->playerDepositModel->id_player = $data['id_player'];
        $this->playerDepositModel->id_attribute = $data['id_attribute'];
        $this->playerDepositModel->value = $data['value'];
        
        $this->playerDepositModel->save();

        return $this->playerDepositModel;
    }

    public function updateModel(PlayerDeposit $playerDepositModel, array $data): void
    {
        $playerDepositModel->id_player = $data['id_player'] ?? $playerDepositModel->id_player;
        $playerDepositModel->id_attribute = $data['id_attribute'] ?? $playerDepositModel->id_attribute;
        $playerDepositModel->value = $data['value'] ?? $playerDepositModel->value;

        $playerDepositModel->update();
    }

}