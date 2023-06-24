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
        Schema::table('seminars', function (Blueprint $table) {
            $table->dropColumn('waktu_tgl_ujian');
        });
        Schema::table('seminars', function (Blueprint $table) {
            $table->time('waktu_ujian')->after('registration_id');
            $table->date('tgl_ujian')->after('waktu_ujian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seminars', function (Blueprint $table) {
            $table->timestamp('waktu_tgl_ujian')->after('registration_id');
        });

        Schema::table('seminars', function (Blueprint $table) {
            $table->dropColumn('waktu_ujian');
            $table->dropColumn('tgl_ujian');
        });
    }
};
