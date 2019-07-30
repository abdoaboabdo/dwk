<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->unsignedBigInteger('door_id')->nullable();
            $table->foreign('door_id')->references('id')->on('doors')->onDelete('cascade');
            $table->unsignedBigInteger('kitchen_id')->nullable();
            $table->foreign('kitchen_id')->references('id')->on('kitchens')->onDelete('cascade');
            $table->unsignedBigInteger('window_id')->nullable();
            $table->foreign('window_id')->references('id')->on('windows')->onDelete('cascade');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
