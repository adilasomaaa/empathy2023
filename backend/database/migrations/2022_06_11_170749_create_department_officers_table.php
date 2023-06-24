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
        Schema::create('department_officers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('department_id')->unsigned();
            $table->bigInteger('personnel_id')->unsigned();
            $table->enum('occupation', ['kajur','sekjur','kaprodi']);
            $table->string('titleless_name');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('personnel_id')->references('id')->on('personnels')->onDelete('cascade')->onUpdate('cascade');
        });
    }

//     table department_officers {
//   id bigint [pk, increment]
//   department_id bigint
//   personnel_id bigint
//   occupation enum ('kajur','sekjur','kaprodi')
//   titleless_name varchar
//   description text
//   start_date date
//   end_date date
// }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_officers');
    }
};
