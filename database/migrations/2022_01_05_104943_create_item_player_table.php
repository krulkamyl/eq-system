<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_player');
            $table->unsignedBigInteger('id_item');
            $table->timestamps();

            $table->foreign('id_player')->references('id')->on('players');
            $table->foreign('id_item')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_players');
    }
}
