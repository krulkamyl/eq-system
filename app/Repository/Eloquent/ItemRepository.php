<?php

namespace App\Repository\Eloquent;

use App\Models\Item;
use Illuminate\Support\Collection;
use App\Repository\ItemRepositoryInterface;

class ItemRepository implements ItemRepositoryInterface {

    private Item $itemModel;

    public function __construct(Item $itemModel)
    {
        $this->itemModel = $itemModel;
    }

    public function all(): Collection {
        return $this->itemModel->get();
    }

    public function get(int $id): Item {
        return $this->itemModel->findOrFail($id);
    }

}