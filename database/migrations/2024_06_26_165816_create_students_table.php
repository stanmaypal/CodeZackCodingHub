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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique();
            $table->string('enrollment_number')->unique();
            $table->string('student_name');
            $table->date('dob');
            $table->string('gender');
            $table->string('course');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('caste');
            $table->date('registration_date');
            $table->string('aadhar')->nullable();
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable();
            $table->text('current_address');
            $table->text('permanent_address');
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
        Schema::dropIfExists('students');
    }
};
