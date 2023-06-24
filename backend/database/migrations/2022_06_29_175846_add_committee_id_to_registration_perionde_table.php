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
        Schema::table('registration_periods', function (Blueprint $table) {
            $table->bigInteger('committee_id')->unsigned()->nullable()->after('annotation_template_id');

            $table->foreign('committee_id')->references('id')->on('committees')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registration_periods', function (Blueprint $table) {
            $table->dropForeign('registration_periods_committee_id_foreign');
            $table->dropColumn('committee_id');
        });
    }
};
