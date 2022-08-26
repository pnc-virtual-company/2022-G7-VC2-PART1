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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('email');
            $table->string('password');
            $table->string('phone_number');
            $table->string('profile');
            $table->string('role');
            $table->foreignId('class_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('batch_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('admin_id')->constrained()->onDelete('CASCADE');
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