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
        Schema::create('annotation_templates', function (Blueprint $table) {
            $table->id();
            $table->string('template_name');
            $table->bigInteger('department_id')->unsigned();
            $table->boolean('is_active');
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('annotation_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('annotation_template_id')->unsigned();
            $table->string('aspect');
            $table->timestamps();

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
        Schema::dropIfExists('annotation_templates');
    }
};
