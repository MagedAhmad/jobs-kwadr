<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_types', function (Blueprint $table) {
            $table->id();
            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('job_type_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_type_id');
            $table->string("name");
            $table->string('locale')->index();
            $table->unique(['job_type_id', 'locale']);
            $table->foreign('job_type_id')->references('id')->on('job_types')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_type_translations');
        Schema::dropIfExists('job_types');
    }
}
