<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LogHistory', function (Blueprint $table) {
            $table->id();                                                               //id
            $table->string('description');                                              //description
            $table->string('solution')->nullable();                                     //solution
            $table->foreign('editedBy')->references('employeeId')->on('Employee');      //editedBy
            $table->timestamp('editedAt');                                              //editedAt
            $table->foreign('problemId')->references('problemId')->on('ProblemLog');    //problemId
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('LogHistory');
    }
}
