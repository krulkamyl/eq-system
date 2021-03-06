<?php

namespace App\Repository;

use App\Models\Item;
use Illuminate\Support\Collection;

interface ItemRepositoryInterface {

    public function all(): Collection;

    public function get(int $id): Item;

}