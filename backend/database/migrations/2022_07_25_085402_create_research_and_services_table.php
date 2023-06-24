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
        Schema::create('research_and_services', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->bigInteger('personnel_id')->unsigned()->nullable();
            $table->string('executor')->nullable();
            $table->year('year')->nullable();
            $table->integer('cost')->nullable();
            $table->enum('category', ['Internasional' ,'Nasional', 'Provinsi','PNBP UNG','PNBP Fakultas','Mandiri']);
            $table->set('status', ['penelitian', 'pengabdian']);
            $table->timestamps();
            $table->foreign('personnel_id')->references('id')->on('personnels')->onDelete('cascade')->onUpdate('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('research_and_services');
    }
};
