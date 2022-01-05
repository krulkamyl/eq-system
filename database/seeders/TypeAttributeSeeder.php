<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Type;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_attributes')->insert([
            [
                'id_type' => Type::whereName('box')->first()->id, 
                'id_attribute' => Attribute::whereName('price')->first()->id, 
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now()
            ],
            [
                'id_type' => Type::whereName('rune')->first()->id, 
                'id_attribute' => Attribute::whereName('bonus')->first()->id, 
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now()
            ],
            [
                'id_type' => Type::whereName('prize')->first()->id, 
                'id_attribute' => Attribute::whereName('code')->first()->id, 
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now()
            ],
            [
                'id_type' => Type::whereName('prize')->first()->id, 
                'id_attribute' => Attribute::whereName('price')->first()->id, 
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now()
            ],
            [
                'id_type' => Type::whereName('prize')->first()->id, 
                'id_attribute' => Attribute::whereName('status')->first()->id, 
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
