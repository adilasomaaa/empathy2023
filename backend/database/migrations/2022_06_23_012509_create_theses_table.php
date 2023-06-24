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
        Schema::create('thesis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->longText('title');
            $table->longText('problems');
            $table->longText('theories');
            $table->longText('references');
            $table->enum('stage', ['skripsi','proposal','hasil','kompre'])->default('proposal');
            $table->bigInteger('thesis_guide_decree_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('thesis_guide_decree_id')->references('id')->on('thesis_guide_decrees')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thesis');
    }
};
