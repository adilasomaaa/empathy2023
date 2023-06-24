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
        Schema::create('thesis_guides', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('personnel_id')->unsigned();
            $table->bigInteger('thesis_id')->unsigned();
            $table->integer('order');
            $table->timestamps();

            $table->foreign('personnel_id')->references('id')->on('personnels')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('thesis_id')->references('id')->on('thesis')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thesis_guides');
    }
};
