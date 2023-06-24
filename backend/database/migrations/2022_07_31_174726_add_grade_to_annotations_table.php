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
        Schema::table('annotations', function (Blueprint $table) {
            $table->integer('grade')->nullable()->after('annotation');
        });

        Schema::table('stages', function (Blueprint $table) {
            $table->dropColumn('assessment_type');
        });

        Schema::table('stages', function (Blueprint $table) {
            $table->enum('assessment_type', ['annotation','grade', 'both'])->after('stage_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('annotations', function (Blueprint $table) {
            $table->dropColumn('grade');
        });

        Schema::table('stages', function (Blueprint $table) {
            $table->dropColumn('assessment_type');
        });

        Schema::table('stages', function (Blueprint $table) {
            $table->enum('assessment_type', ['annotation','grade', 'both'])->after('stage_name');
        });
    }
};
