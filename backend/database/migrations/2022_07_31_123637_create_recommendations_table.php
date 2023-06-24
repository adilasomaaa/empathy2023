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
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('examiner_id')->unsigned();
            $table->bigInteger('seminar_id')->unsigned();
            $table->enum('recommendation', ['diterima', 'terima_bersyarat', 'ditolak']);
            $table->timestamps();

            $table->foreign('examiner_id')->references('id')->on('examiners')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('seminar_id')->references('id')->on('seminars')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recommendations');
    }
};
