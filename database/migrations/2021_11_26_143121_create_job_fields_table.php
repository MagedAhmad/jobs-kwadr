<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_fields', function (Blueprint $table) {
            $table->id();
            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('job_field_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_field_id');
            $table->string("name");
            $table->string('locale')->index();
            $table->unique(['job_field_id', 'locale']);
            $table->foreign('job_field_id')->references('id')->on('job_fields')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_field_translations');
        Schema::dropIfExists('job_fields');
    }
}
