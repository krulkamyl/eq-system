<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Player;
use App\Models\PlayerDeposit;
use Illuminate\Database\Seeder;

class PlayerDepositSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Player::all()->each(function (Player $player) {
            foreach(Attribute::whereIn('name', ['price', 'bonus'])->get() as $attribute) {

                $playerDeposit = PlayerDeposit::factory()->make();

                $playerDeposit->id_player = $player->id;
                $playerDeposit->id_attribute = $attribute->id;
                
                $playerDeposit->save();   
            }
        });
    }
}
