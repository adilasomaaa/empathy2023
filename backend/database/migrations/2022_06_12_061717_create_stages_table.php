<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('department_id')->unsigned();
            $table->string('stage_name');
            $table->set('assessment_type', ['annotation','grade']);
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
        });
    }

//     table stages {
//   id bigint [pk]
//   department_id bigint
//   stage_name varchar
//   assessment_type set('annotation','grade')
// }

    public function down()
    {
        Schema::dropIfExists('stages');
    }
};
