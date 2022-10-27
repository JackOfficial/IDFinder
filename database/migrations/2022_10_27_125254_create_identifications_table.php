<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('owner_name');
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('place_of_issue')->nullable();
            $table->string('id_number')->nullable();
            $table->string('photo')->nullable();
            $table->string('front_photo')->nullable();
            $table->string('back_photo')->nullable();
            $table->longText('description')->nullable();
            $table->string('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('identifications');
    }
};
