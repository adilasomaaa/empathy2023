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
            $table->enum('uploadBy', ['drive','storage'])->after('file_url');
        });
        Schema::table('research_service_documents', function (Blueprint $table) {
            $table->enum('uploadBy', ['drive','storage'])->after('file_url');
        });
        Schema::table('scientific_seminar_documents', function (Blueprint $table) {
            $table->enum('uploadBy', ['drive','storage'])->after('file_url');
        });
        Schema::table('scientific_work_documents', function (Blueprint $table) {
            $table->enum('uploadBy', ['drive','storage'])->after('file_url');
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
            $table->dropColumn('uploadBy');
        });
        Schema::table('research_service_documents', function (Blueprint $table) {
            $table->dropColumn('uploadBy');
        });
        Schema::table('scientific_seminar_documents', function (Blueprint $table) {
            $table->dropColumn('uploadBy');
        });
        Schema::table('scientific_work_documents', function (Blueprint $table) {
            $table->dropColumn('uploadBy');
        });
    }
};
