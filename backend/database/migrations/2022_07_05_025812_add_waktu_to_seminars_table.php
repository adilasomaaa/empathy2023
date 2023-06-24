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
            $table->dropColumn('waktu_ujian');
            $table->time('waktu_mulai')->nullable()->after('registration_id');
            $table->time('waktu_selesai')->nullable()->after('registration_id');
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
            $table->time('waktu_ujian')->after('registration_id')->nullable();
            $table->dropColumn('waktu_mulai');
            $table->dropColumn('waktu_selesai');
        });
    }
};
