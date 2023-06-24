<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign('books_personnel_id_foreign');
            $table->dropColumn('personnel_id');
        });
        //  Schema::table('books', function (Blueprint $table) {
            
        // });

        Schema::create('book_personnels', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('document_id')->unsigned();
            $table->bigInteger('personnel_id')->unsigned();
            $table->foreign('document_id')->references('id')->on('book_documents')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('personnel_id')->references('id')->on('personnels')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_personnels');

        Schema::table('books', function (Blueprint $table) {
            $table->bigInteger('personnel_id')->unsigned()->nullable()->after('id');
            $table->foreign('personnel_id')->references('id')->on('personnels')->onDelete('cascade')->onUpdate('cascade');
        });
    }
};
