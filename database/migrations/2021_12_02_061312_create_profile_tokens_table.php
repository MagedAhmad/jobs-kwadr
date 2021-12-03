<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('token');
            $table->unsignedBigInteger('profile_id');
            $table->integer('step')->default(0);

            $table->foreign('profile_id')->references('id')->on('profiles')->cascadeOnDelete();
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
        Schema::dropIfExists('profile_tokens');
    }
}
