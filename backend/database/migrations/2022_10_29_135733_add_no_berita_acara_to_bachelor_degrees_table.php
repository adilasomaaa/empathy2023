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
        Schema::table('bachelor_degrees', function (Blueprint $table) {
            $table->string('no_berita_acara')->nullable()->after('student_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bachelor_degrees', function (Blueprint $table) {
            $table->dropColumn('no_berita_acara');
        });
    }
};
