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
        Schema::create('scientific_work_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scientific_work_id')->nullable();
            $table->string('file_name')->nullable();
            $table->text('file_url')->nullable();
            $table->boolean('is_published')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->foreign('scientific_work_id')->references('id')->on('scientific_works')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scientific_work_documents');
    }
};
