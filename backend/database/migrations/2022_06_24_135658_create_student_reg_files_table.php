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
        Schema::create('student_reg_files', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('registration_id')->unsigned();
            $table->bigInteger('reg_file_list_id')->unsigned();
            $table->text('file')->nullable();
            $table->timestamps();

            $table->foreign('registration_id')->references('id')->on('registrations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('reg_file_list_id')->references('id')->on('reg_file_lists')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_reg_files');
    }
};
