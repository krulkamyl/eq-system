<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_deposits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_player');
            $table->unsignedBigInteger('id_attribute');
            $table->float('value');
            $table->timestamps();

            $table->foreign('id_player')->references('id')->on('players');
            $table->foreign('id_attribute')->references('id')->on('attributes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_deposits');
    }
}
