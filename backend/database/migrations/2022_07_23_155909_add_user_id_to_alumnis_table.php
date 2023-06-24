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
        
        Schema::table('alumnis', function (Blueprint $table) {
            $table->dropForeign('alumnis_user_id_foreign');
            $table->dropColumn('user_id');
        });

        Schema::table('alumnis', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->nullable()->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('alumnis', function (Blueprint $table) {
            $table->dropForeign('alumnis_user_id_foreign');
            $table->dropColumn('user_id');
        });

        Schema::table('alumnis', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->nullable()->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }
};
