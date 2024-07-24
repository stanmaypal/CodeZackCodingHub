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
        Schema::create('contact_info', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable(); // Store the image file name
            $table->string('name');
            $table->text('about')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('twitter_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->text('map_link')->nullable();
            $table->text('address')->nullable();
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
        Schema::dropIfExists('contact_info');
    }
};
