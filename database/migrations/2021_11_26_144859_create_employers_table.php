<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('employer_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id');
            $table->string("name");
            $table->string('locale')->index();
            $table->unique(['employer_id', 'locale']);
            $table->foreign('employer_id')->references('id')->on('employers')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employer_translations');
        Schema::dropIfExists('employers');
    }
}
