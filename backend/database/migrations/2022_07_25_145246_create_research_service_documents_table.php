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
        Schema::create('research_service_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('research_service_id')->nullable();
            $table->string('file_name')->nullable();
            $table->text('file_url')->nullable();
            $table->boolean('is_published')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->foreign('research_service_id')->references('id')->on('research_and_services')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('research_service_documents');
    }
};
