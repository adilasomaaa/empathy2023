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
            $table->dropForeign('bachelor_degrees_bachelor_degree_decree_id_foreign');
            $table->dropColumn('bachelor_degree_decree_id');
        });

        Schema::table('bachelor_degrees', function (Blueprint $table) {
            $table->bigInteger('bachelor_degree_decree_id')->unsigned()->nullable()->after('id');
            $table->foreign('bachelor_degree_decree_id')->references('id')->on('bachelor_degree_decrees')->onDelete('cascade')->onUpdate('cascade');

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
            $table->dropForeign('bachelor_degrees_bachelor_degree_decree_id_foreign');
            $table->dropColumn('bachelor_degree_decree_id');
        });

        Schema::table('bachelor_degrees', function (Blueprint $table) {
            $table->bigInteger('bachelor_degree_decree_id')->unsigned()->nullable()->after('id');
            $table->foreign('bachelor_degree_decree_id')->references('id')->on('bachelor_degree_decrees')->onDelete('cascade')->onUpdate('cascade');

        });
    }
};
