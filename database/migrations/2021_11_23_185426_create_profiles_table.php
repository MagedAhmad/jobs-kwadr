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
            $table->string("first_name");
            $table->string("father_name");
            $table->string("grandfather_name");
            $table->string("family_name");
            $table->string("gender");
            $table->string("id_number");
            $table->string("social_security_number");
            $table->string("phone");
            $table->string("email")->unique();
            $table->boolean("has_disability");
            $table->boolean("has_driving_license");

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
