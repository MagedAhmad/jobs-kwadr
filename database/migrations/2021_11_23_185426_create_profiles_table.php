<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string("first_name")->nullable();
            $table->string("father_name")->nullable();
            $table->string("grandfather_name")->nullable();
            $table->string("family_name")->nullable();
            $table->string("gender")->nullable();
            $table->string("id_number")->nullable();
            $table->string("social_security_number")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->unique();
            $table->boolean("has_disability")->nullable();
            $table->boolean("has_driving_license")->nullable();
            $table->boolean('status')->default(false)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
