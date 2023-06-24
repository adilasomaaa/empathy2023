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
        Schema::table('thesis_guide_decrees', function (Blueprint $table) {
            $table->bigInteger('department_id')->unsigned()->nullable()->after('id');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thesis_guide_decrees', function (Blueprint $table) {
            $table->dropForeign('thesis_guide_decrees_department_id_foreign');
            $table->dropColumn('department_id');
        });
    }
};
