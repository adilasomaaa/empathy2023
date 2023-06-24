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
        Schema::create('alumni_traces', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('alumni_id')->unsigned();
            $table->enum('type', ['education','occupation']);
            $table->string('place')->nullable();
            $table->text('description')->nullable();
            $table->text('prove_document')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('alumni_traces');
    }
};
