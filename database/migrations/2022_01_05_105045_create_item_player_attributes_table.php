<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPlayerAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_item_player');
            $table->unsignedBigInteger('id_attribute');
            $table->text('value');
            $table->timestamps();

            $table->foreign('id_item_player')->references('id')->on('item_player');
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
        Schema::dropIfExists('player_attributes');
    }
}
