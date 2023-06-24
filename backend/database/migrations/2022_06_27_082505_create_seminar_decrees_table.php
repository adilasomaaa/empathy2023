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
        Schema::create('seminar_decrees', function (Blueprint $table) {
            $table->id();
            $table->string('decree_number');
            $table->date('decree_date');
            $table->text('decree_file')->nullable();
            $table->string('invitation_letter_number');
            $table->date('invitation_letter_date');
            $table->timestamps();
        });

        Schema::table('seminars', function (Blueprint $table) {
            $table->bigInteger('seminar_decree_id')->unsigned()->after('order')->nullable();
            $table->foreign('seminar_decree_id')->references('id')->on('seminar_decrees')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('seminar_decrees');
    }
};
