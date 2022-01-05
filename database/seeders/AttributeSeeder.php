<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert([
            ['name' => 'price', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'bonus', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'code', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'prize', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'status', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
