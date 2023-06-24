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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('thesis_id')->unsigned();
            $table->bigInteger('registration_period_id')->unsigned();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();

            $table->foreign('thesis_id')->references('id')->on('thesis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('registration_period_id')->references('id')->on('registration_periods')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
};
