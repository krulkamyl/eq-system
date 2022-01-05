<?php

namespace App\Repository;

use App\Models\PlayerDeposit;

interface PlayerDepositRepositoryInterface {

    public function createModel(array $data) : PlayerDeposit;

    public function updateModel(PlayerDeposit $playerDeposit, array $data): void;

}