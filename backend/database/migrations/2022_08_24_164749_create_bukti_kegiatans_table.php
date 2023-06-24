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
        Schema::create('bukti_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('action_id')->unsigned()->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('filename')->nullable();
            $table->enum('status', ['penugasan', 'realisasi']);
            $table->timestamps();
            $table->foreign('action_id')->references('id')->on('actions')->onDelete('cascade')->onUpdate('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('bukti_kegiatans');
    }
};
