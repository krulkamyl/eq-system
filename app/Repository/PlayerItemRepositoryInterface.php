<?php

namespace App\Repository;

use App\Models\PlayerItem;

interface PlayerItemRepositoryInterface {

    public function createModel(array $data) : PlayerItem;

}
