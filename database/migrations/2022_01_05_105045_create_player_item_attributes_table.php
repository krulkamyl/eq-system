<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerItemAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_item_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_player_item');
            $table->unsignedBigInteger('id_attribute');
            $table->text('value');
            $table->timestamps();

            $table->foreign('id_player_item')->references('id')->on('player_items');
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
        Schema::dropIfExists('player_item_attributes');
    }
}
