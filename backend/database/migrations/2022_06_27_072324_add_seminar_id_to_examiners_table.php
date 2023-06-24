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
        Schema::table('examiners', function (Blueprint $table) {
            $table->dropForeign('examiners_registration_id_foreign');
            $table->dropColumn('registration_id');
        });
        Schema::table('examiners', function (Blueprint $table) {
            $table->bigInteger('seminar_id')->unsigned()->after('personnel_id');
            $table->foreign('seminar_id')->references('id')->on('seminars')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('examiners', function (Blueprint $table) {
            $table->bigInteger('registration_id')->unsigned()->after('personnel_id');
            $table->foreign('registration_id')->references('id')->on('registrations')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('examiners', function (Blueprint $table) {
            $table->dropForeign('examiners_seminar_id_foreign');
            $table->dropColumn('seminar_id');
        });
    }
};
