<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGoalsToProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('first_goal')->nullable();
            $table->unsignedBigInteger('second_goal')->nullable();
            $table->unsignedBigInteger('third_goal')->nullable();

            $table->foreign('first_goal')->references('id')->on('cities')->cascadeOnDelete();
            $table->foreign('second_goal')->references('id')->on('cities')->cascadeOnDelete();
            $table->foreign('third_goal')->references('id')->on('cities')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            //
        });
    }
}
