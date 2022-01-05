<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_type');
            $table->unsignedBigInteger('id_attribute');

            $table->timestamps();

            $table->foreign('id_type')->references('id')->on('types');
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
        Schema::dropIfExists('type_attributes');
    }
}
