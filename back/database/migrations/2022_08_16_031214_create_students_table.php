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
            $table->string('First_name');
            $table->string('Last_name');
            $table->string('Gender');
            $table->string('Email');
            $table->string('Password');
            $table->string('Phone_number');
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
