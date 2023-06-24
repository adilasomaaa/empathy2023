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
        Schema::create('registration_periods', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stage_id')->unsigned();
            $table->date('event_start_date');
            $table->date('reg_start');
            $table->date('reg_end');
            $table->enum('semester', ['ganjil','genap']);
            $table->string('academic_year');
            $table->bigInteger('reg_file_template_id')->unsigned();
            $table->bigInteger('grading_template_id')->unsigned();
            $table->bigInteger('annotation_template_id')->unsigned();
            $table->timestamps();

            $table->foreign('stage_id')->references('id')->on('stages')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('reg_file_template_id')->references('id')->on('reg_file_templates')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('grading_template_id')->references('id')->on('grading_templates')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('annotation_template_id')->references('id')->on('annotation_templates')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registration_periods');
    }
};
