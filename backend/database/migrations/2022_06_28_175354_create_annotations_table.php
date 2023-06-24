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
        Schema::create('annotations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('examiner_id')->unsigned()->nullable();
            $table->bigInteger('annotation_list_id')->unsigned()->nullable();
            $table->text('annotation')->nullable();
            $table->timestamps();
            
            $table->foreign('examiner_id')->references('id')->on('examiners')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('annotation_list_id')->references('id')->on('annotation_lists')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annotations');
    }
};
