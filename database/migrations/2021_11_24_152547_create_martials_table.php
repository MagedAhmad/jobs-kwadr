<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMartialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('martials', function (Blueprint $table) {
            $table->id();
            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('martial_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('martial_id');
            $table->string("name");
            $table->string('locale')->index();
            $table->unique(['martial_id', 'locale']);
            $table->foreign('martial_id')->references('id')->on('martials')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('martial_translations');
        Schema::dropIfExists('martials');
    }
}
