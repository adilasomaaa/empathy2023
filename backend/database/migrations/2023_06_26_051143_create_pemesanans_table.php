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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->text('lokasi')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->text('deskrpsi')->nullable();
            $table->string('nohp')->nullable();
            $table->text('foto')->nullable();
            $table->foreignId('rumah_sakit_id')->constrained('rumah_sakit');
            // $table->enum('status', [])->nullable()->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
};
