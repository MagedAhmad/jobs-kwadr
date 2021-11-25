<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('provider_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provider_id');
            $table->string('name')->nullable();
            $table->string('locale')->index();
            $table->unique(['provider_id', 'locale']);
            $table->foreign('provider_id')->references('id')->on('providers')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provider_translations');
        Schema::dropIfExists('providers');
    }
}
