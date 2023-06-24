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
        Schema::table('scientific_seminars', function (Blueprint $table) {
            $table->dropForeign('scientific_seminars_personnel_id_foreign');
            $table->dropColumn('personnel_id');
        });

        Schema::create('scientific_seminar_personnels', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('document_id')->unsigned();
            $table->bigInteger('personnel_id')->unsigned();
            $table->foreign('document_id')->references('id')->on('scientific_seminar_documents')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('personnel_id')->references('id')->on('personnels')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('scientific_seminar_personnels');

        Schema::table('scientific_seminars', function (Blueprint $table) {
            $table->bigInteger('personnel_id')->unsigned()->nullable()->after('id');
            $table->foreign('personnel_id')->references('id')->on('personnels')->onDelete('cascade')->onUpdate('cascade');
        });
    }
};
