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
            $table->string('fullname');
            $table->string('nim');
            $table->year('class_year');
            $table->date('birthdate');
            $table->string('birthplace');
            $table->enum('sex', ['L','P']);
            $table->string('handphone');
            $table->boolean('is_active');
            // user_id bigint
            // study_program_id bigint
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('study_program_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('study_program_id')->references('id')->on('study_programs')->onUpdate('cascade')->onDelete('cascade');

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
