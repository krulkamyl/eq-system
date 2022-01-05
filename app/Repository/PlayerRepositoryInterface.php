<?php

namespace App\Repository;

use App\Models\Player;
use Illuminate\Support\Collection;

interface PlayerRepositoryInterface {

    public function all(): Collection;
    
    public function get(int $id): Player;

}