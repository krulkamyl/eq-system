<?php

namespace App\Repository;

use Illuminate\Support\Collection;

interface ItemRepositoryInterface {

    public function all(): Collection;

}