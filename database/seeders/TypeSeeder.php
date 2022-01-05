<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            ['name' => 'box', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'rune', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'prize', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
