<?php

namespace App\Repository;

use App\Models\PlayerItem;

interface PlayerItemAttributeRepositoryInterface
{
    public function createModel(array $data) : PlayerItem;

}
