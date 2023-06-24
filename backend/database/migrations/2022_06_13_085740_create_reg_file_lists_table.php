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
        Schema::create('reg_file_lists', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->bigInteger('reg_file_template_id')->unsigned();
            $table->foreign('reg_file_template_id')->references('id')->on('reg_file_templates')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('reg_file_lists');
    }
};
