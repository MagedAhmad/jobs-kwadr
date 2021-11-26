<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supporters', function (Blueprint $table) {
            $table->id();
            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('supporter_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supporter_id');
            $table->string("name");
            $table->string('locale')->index();
            $table->unique(['supporter_id', 'locale']);
            $table->foreign('supporter_id')->references('id')->on('supporters')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supporter_translations');
        Schema::dropIfExists('supporters');
    }
}
