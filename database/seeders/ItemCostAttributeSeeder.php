<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\ItemCostAttribute;
use Illuminate\Database\Seeder;

class ItemCostAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::all()->each(function (Item $item) {
            foreach($item->type->attributes as $attribute) {
                if (in_array($attribute->attribute->name, ['price', 'bonus'])) {
                    $itemAttribute = ItemCostAttribute::factory()->make();

                    $itemAttribute->id_item = $item->id;
                    $itemAttribute->id_attribute = $attribute->id_attribute;
                    
                    $itemAttribute->save();   
                }
            }
        });
    }
}
