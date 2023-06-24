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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('examiner_id')->unsigned()->nullable();
            $table->bigInteger('grading_list_id')->unsigned()->nullable();
            $table->double('grade')->nullable();
            $table->timestamps();
            
            $table->foreign('examiner_id')->references('id')->on('examiners')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('grading_list_id')->references('id')->on('grading_lists')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
};
