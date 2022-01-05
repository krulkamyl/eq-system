<?php

namespace App\Repository;

use App\Models\ItemPlayer;

interface ItemPlayerRepositoryInterface {

    public function createModel(array $data) : ItemPlayer;

}