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
        

        Schema::table('alumnis', function (Blueprint $table) {
            $table->bigInteger('study_program_id')->unsigned()->nullable()->after('id');
            $table->foreign('study_program_id')->references('id')->on('study_programs')->onDelete('cascade')->onUpdate('cascade');

            $table->dropColumn('study_program');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumnis', function (Blueprint $table) {
            $table->dropForeign('alumnis_study_program_id_foreign');
            $table->dropColumn('study_program_id');

            $table->string('study_program')->nullable()->after('nim');
        });
    }
};
