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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->string('subject_expertise');
            $table->date('dob');
            $table->string('phone');
            $table->string('email')->unique();
            $table->text('address');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('instagram_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('teachers');
    }
};
