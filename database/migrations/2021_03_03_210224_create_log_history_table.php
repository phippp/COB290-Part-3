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
            $table->integer('editedBy')->unsigned();                                    //editedBy
            $table->foreign('editedBy')->references('employeeId')->on('Employee');      //editedBy - constraint
            $table->timestamp('editedAt');                                              //editedAt
            $table->integer('problemId')->unsigned();                                   //problemId
            $table->foreign('problemId')->references('problemId')->on('ProblemLog');    //problemId - constraint
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
