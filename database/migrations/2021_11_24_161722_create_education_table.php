<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('education_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('education_id');
            $table->string("name");
            $table->string('locale')->index();
            $table->unique(['education_id', 'locale']);
            $table->foreign('education_id')->references('id')->on('education')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_translations');
        Schema::dropIfExists('education');
    }
}
