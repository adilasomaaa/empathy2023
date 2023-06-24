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
        Schema::table('stages', function (Blueprint $table) {
            $table->integer('lama_waktu_ujian')->nullable()->after('assessment_type');
            $table->time('mulai_istirahat')->nullable()->after('lama_waktu_ujian');
            $table->time('selesai_istirahat')->nullable()->after('mulai_istirahat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stages', function (Blueprint $table) {
            $table->dropColumn('lama_waktu_ujian');
            $table->dropColumn('mulai_istirahat');
            $table->dropColumn('selesai_istirahat');
        });
    }
};
