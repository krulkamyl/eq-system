<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_item');
            $table->unsignedBigInteger('id_attribute');
            $table->string('value');
            $table->timestamps();

            $table->foreign('id_item')->references('id')->on('items');
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
        Schema::dropIfExists('item_attributes');
    }
}
