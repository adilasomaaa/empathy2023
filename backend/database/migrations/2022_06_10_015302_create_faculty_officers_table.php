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
        Schema::create('faculty_officers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('faculty_id')->unsigned();
            $table->bigInteger('personnel_id')->unsigned();
            $table->enum('occupation', ['dekan', 'wadek','']);
            $table->string('titleless_name');
            $table->text('description');
            $table->boolean('is_active');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('personnel_id')->references('id')->on('personnels')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculty_officers');
    }
};
