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
        Schema::table('thesis', function (Blueprint $table) {
            $table->dropForeign('thesis_thesis_guide_decree_id_foreign');
            $table->dropColumn('thesis_guide_decree_id');
        });

        Schema::table('thesis', function (Blueprint $table) {
            // $table->dropForeign('seminars_seminar_decree_id_foreign');
            $table->bigInteger('thesis_guide_decree_id')->unsigned()->after('stage')->nullable();
            $table->foreign('thesis_guide_decree_id')->references('id')->on('thesis_guide_decrees')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thesis', function (Blueprint $table) {
            $table->dropForeign('thesis_thesis_guide_decree_id_foreign');
            $table->dropColumn('thesis_guide_decree_id');
        });

        Schema::table('thesis', function (Blueprint $table) {
            // $table->dropForeign('seminars_seminar_decree_id_foreign');
            $table->bigInteger('thesis_guide_decree_id')->unsigned()->after('stage')->nullable();
            $table->foreign('thesis_guide_decree_id')->references('id')->on('thesis_guide_decrees')->onUpdate('cascade')->onDelete('set null');
        });
    }
};
