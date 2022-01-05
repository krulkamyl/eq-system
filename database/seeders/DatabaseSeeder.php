<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TypeSeeder::class,
            AttributeSeeder::class,
            TypeAttributeSeeder::class,
            ItemSeeder::class,
            ItemAttributeSeeder::class,
            ItemCostAttributeSeeder::class,
            PlayerSeeder::class,
            PlayerDepositSeeder::class
        ]);
    }
}
