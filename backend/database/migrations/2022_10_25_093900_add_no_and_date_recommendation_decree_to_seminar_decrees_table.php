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
        Schema::table('seminar_decrees', function (Blueprint $table) {
            // $table->dropColumn('decree_date');
            // $table->dropColumn('invitation_letter_date');

            // $table->date('decree_date')->nullable()->after('decree_number');
            // $table->date('invitation_letter_date')->nullable()->after('invitation_letter_number');

            $table->string('recommendation_letter_number')->nullable()->after('invitation_letter_date');
            $table->date('recommendation_letter_date')->nullable()->after('recommendation_letter_number');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seminar_decrees', function (Blueprint $table) {
            $table->dropColumn('recommendation_letter_number');
            $table->dropColumn('recommendation_letter_date');

            // $table->dropColumn('decree_date');
            // $table->dropColumn('invitation_letter_date');

            // $table->date('decree_date')->nullable()->after('decree_number');
            // $table->date('invitation_letter_date')->nullable()->after('invitation_letter_number');
        });
    }
};
