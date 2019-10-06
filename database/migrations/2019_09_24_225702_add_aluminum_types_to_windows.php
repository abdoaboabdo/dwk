<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAluminumTypesToWindows extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('windows', function (Blueprint $table) {
            $table->unsignedBigInteger('aluminum_type_id')->default(1);
            $table->foreign('aluminum_type_id')->references('id')->on('aluminum_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('windows', function (Blueprint $table) {

            $table->dropColumn(['aluminum_type_id']);
        });
    }
}
