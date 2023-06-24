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
        Schema::create('last_stage_registrations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('registration_id')->unsigned();
            $table->integer('jumlah_sks');
            $table->double('ipk');
            $table->enum('pernah_mengulang', ['ya','tidak']);
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();

            $table->foreign('registration_id')->references('id')->on('registrations')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('last_stage_registrations');
    }
};
