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
        Schema::create('bachelor_degrees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('bachelor_degree_decree_id')->unsigned();
            $table->integer('total_kxn')->nullable();
            $table->integer('total_nilai_komprehensif')->nullable();
            $table->double('nilai_angka_komprehensif')->nullable();
            $table->double('rerata_index_yudisium')->nullable();
            $table->string('predikat')->nullable();
            $table->float('lama_studi')->nullable();
            $table->float('lama_bimbingan')->nullable();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('bachelor_degree_decree_id')->references('id')->on('bachelor_degree_decrees')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bachelor_degrees');
    }
};
