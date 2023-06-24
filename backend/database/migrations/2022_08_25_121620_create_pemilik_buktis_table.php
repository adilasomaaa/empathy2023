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
        Schema::create('pemilik_buktis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('participant_id')->unsigned()->nullable();
            $table->bigInteger('bukti_kegiatan_id')->unsigned()->nullable();
            $table->enum('status', ['penugasan', 'realisasi']);
            $table->timestamps();
            $table->foreign('participant_id')->references('id')->on('activity_participants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('bukti_kegiatan_id')->references('id')->on('bukti_kegiatans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemilik_buktis');
    }
};
