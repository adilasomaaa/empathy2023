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
            $table->dropForeign('seminars_seminar_decree_id_foreign');
            $table->dropColumn('seminar_decree_id');
        });
        
        Schema::table('seminars', function (Blueprint $table) {
            // $table->dropForeign('seminars_seminar_decree_id_foreign');
            $table->bigInteger('seminar_decree_id')->unsigned()->after('registration_id')->nullable();
            $table->foreign('seminar_decree_id')->references('id')->on('seminar_decrees')->onUpdate('cascade')->onDelete('set null');
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
            $table->dropForeign('seminars_seminar_decree_id_foreign');
            $table->dropColumn('seminar_decree_id');
        });
        
        Schema::table('seminars', function (Blueprint $table) {
            // $table->dropForeign('seminars_seminar_decree_id_foreign');
            $table->bigInteger('seminar_decree_id')->unsigned()->after('registration_id')->nullable();
            $table->foreign('seminar_decree_id')->references('id')->on('seminar_decrees')->onUpdate('cascade')->onDelete('set null');
        });
    }
};
