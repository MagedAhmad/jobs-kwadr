<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_types', function (Blueprint $table) {
            $table->id();
            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('training_type_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_type_id');
            $table->string("name");
            $table->string('locale')->index();
            $table->unique(['training_type_id', 'locale']);
            $table->foreign('training_type_id')->references('id')->on('training_types')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_type_translations');
        Schema::dropIfExists('training_types');
    }
}
