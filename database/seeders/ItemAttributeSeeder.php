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
            $code = Attribute::whereName('code')->first()->id;
            foreach($item->type->attributes as $attribute) {
                if ($attribute->id == $code) {
                    $itemAttribute = ItemAttribute::factory()->make();

                    $itemAttribute->id_item = $item->id;
                    $itemAttribute->id_attribute = $attribute->id_attribute;
                    
                    $itemAttribute->save();   
                }
            }
        });
    }
}
