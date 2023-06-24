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
        Schema::create('thesis_consulting_chats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('from_id')->unsigned()->nullable();
            $table->bigInteger('to_id')->unsigned()->nullable();
            $table->bigInteger('thesis_consulting_id')->unsigned();
            $table->text('attachment')->nullable();
            $table->text('message')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->timestamps();

            $table->foreign('thesis_consulting_id')->references('id')->on('thesis_consultings')->onDelete('cascade')->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('thesis_consulting_chats');
    }
};
