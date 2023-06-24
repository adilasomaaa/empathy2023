<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thesis_consultings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('thesis_id')->unsigned()->nullable();
            $table->bigInteger('thesis_guide_id')->unsigned();
            $table->text('topic')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->timestamps();

            $table->foreign('thesis_id')->references('id')->on('thesis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('thesis_guide_id')->references('id')->on('thesis')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thesis_consultings');
    }
};
