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
            $table->text('conclusion')->after('finished_at')->nullable();
            $table->text('signature')->after('conclusion')->nullable();
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
            $table->dropColumn('conclusion');
            $table->dropColumn('signature');
        });
    }
};
