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
        Schema::create('grading_templates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('department_id')->unsigned();
            $table->boolean('is_active');
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
        });


        Schema::create('grading_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('grading_template_id')->unsigned();
            $table->string('aspect');
            $table->timestamps();

            $table->foreign('grading_template_id')->references('id')->on('grading_templates')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grading_template_lists');
        Schema::dropIfExists('grading_templates');
    }
};
