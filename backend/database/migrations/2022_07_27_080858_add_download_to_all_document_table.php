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
        Schema::table('book_documents', function (Blueprint $table) {
            $table->integer('download')->after('published_at')->default(0);
        });
        Schema::table('research_service_documents', function (Blueprint $table) {
            $table->integer('download')->after('published_at')->default(0);
        });
        Schema::table('scientific_seminar_documents', function (Blueprint $table) {
            $table->integer('download')->after('published_at')->default(0);
        });
        Schema::table('scientific_work_documents', function (Blueprint $table) {
            $table->integer('download')->after('published_at')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_documents', function (Blueprint $table) {
            $table->dropColumn('download');
        });
        Schema::table('research_service_documents', function (Blueprint $table) {
            $table->dropColumn('download');
        });
        Schema::table('scientific_seminar_documents', function (Blueprint $table) {
            $table->dropColumn('download');
        });
        Schema::table('scientific_work_documents', function (Blueprint $table) {
            $table->dropColumn('download');
        });
    }
};
