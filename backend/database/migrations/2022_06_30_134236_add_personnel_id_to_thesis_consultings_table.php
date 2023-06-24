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
        Schema::table('thesis_consultings', function (Blueprint $table) {
            $table->dropForeign('thesis_consultings_thesis_guide_id_foreign');
            $table->dropColumn('thesis_guide_id');
        });
        Schema::table('thesis_consultings', function (Blueprint $table) {
            $table->bigInteger('personnel_id')->unsigned()->nullable()->after('id');
            $table->foreign('personnel_id')->references('id')->on('personnels')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status', ['bimbingan', 'revisi'])->after('topic')->default('bimbingan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thesis_consultings', function (Blueprint $table) {
            $table->bigInteger('thesis_guide_id')->unsigned()->nullable()->after('id');
            $table->foreign('thesis_guide_id')->references('id')->on('thesis_guides')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('thesis_consultings', function (Blueprint $table) {
            $table->dropForeign('thesis_consultings_personnel_id_foreign');
            $table->dropColumn('personnel_id');

            $table->dropColumn('status');
        });
    }
};
