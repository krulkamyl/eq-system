<?php

namespace App\Repository\Eloquent;

use App\Models\Player;
use Illuminate\Support\Collection;
use App\Repository\PlayerRepositoryInterface;

class PlayerRepository implements PlayerRepositoryInterface {

    private Player $playerModel;

    public function __construct(Player $playerModel)
    {
        $this->playerModel = $playerModel;
    }

    public function all(): Collection {
        return $this->playerModel->get();
    }

    public function get(int $id): Player {
        return $this->playerModel->findOrFail($id);
    }

}