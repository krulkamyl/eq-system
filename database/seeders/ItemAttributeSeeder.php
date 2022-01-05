<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Attribute;
use App\Models\ItemAttribute;
use Illuminate\Database\Seeder;

class ItemAttributeSeeder extends Seeder
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
                
                $status = Attribute::whereName('status')->first();

                $itemAttribute = ItemAttribute::factory()->make();

                $itemAttribute->id_item = $item->id;
                $itemAttribute->id_attribute = $attribute->id_attribute;
                
                if ($attribute->id_attribute == $status->id) {
                    $itemAttribute->value = random_int(0, 2);
                }
                
                $itemAttribute->save();
            }

        });

    }
}
